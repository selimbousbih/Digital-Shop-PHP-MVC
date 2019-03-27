<?php
include_once 'psl-config.php';
 
function sec_session_start() {
    $session_name = 'sec_session_id'; 
    $secure = SECURE;

    $httponly = true;
    // Force la session utiliser que les cookies
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }
    // Récupere les parametres actuels de cookies
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"], 
        $cookieParams["domain"], 
        $secure,
        $httponly);
    // Donne a la session le nom configure plus haut
    session_name($session_name);
    session_start();            // Démarre la session PHP 
    session_regenerate_id();    // Génére une nouvelle session et efface la précédente
}


function login($email, $password, $db) {
    if ($stmt = $db->prepare("SELECT id, username, password, salt 
        FROM admin
		WHERE email = ?
        LIMIT 1")) {
        $stmt->bindParam(1, $email); 
        $stmt->execute();    
	
        $stmt->bindColumn(1, $user_id);
		$stmt->bindColumn(2, $username);
		$stmt->bindColumn(3, $db_password);
		$stmt->bindColumn(4, $salt);
		$stmt->fetch();
		
        $password = hash('sha512', $password . $salt);
        if ($stmt->rowCount() == 1) {
            if (checkbrute($user_id, $db) == true) {
                // Le compte est verrouillé 
                return false;
            } else {
                if ($db_password == $password) {
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);    // Protection XSS
                    $_SESSION['user_id'] = $user_id;
					
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);    // Protection XSS
                    
					$_SESSION['username'] = $username;
                    $_SESSION['login_string'] = hash('sha512', 
                              $password . $user_browser);
							  
                    return true;
                } else {
                    $now = time();
                    $db->query("INSERT INTO login_attempts(user_id, time)
                                    VALUES ('$user_id', '$now')");
                    return false;
                }
            }
        } else {
            return false;
        }
    }
}

function checkbrute($user_id, $db) {
    $now = time();
 
    $valid_attempts = $now - (2 * 60 * 60);
 
    if ($stmt = $db->prepare("SELECT time 
                             FROM login_attempts
                             WHERE user_id = ? 
                            AND time > '$valid_attempts'")) {
        $stmt->bindParam(1, $user_id); 
        $stmt->execute();
        
        if ($stmt->rowCount() > 5) {
            return true;
        } else {
            return false;
        }
    }
}


function login_check($db) {
    if (isset($_SESSION['user_id'], 
                        $_SESSION['username'], 
                        $_SESSION['login_string'])) {
 
        $user_id = $_SESSION['user_id'];
        $login_string = $_SESSION['login_string'];
        $username = $_SESSION['username'];
 
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
 
        if ($stmt = $db->prepare("SELECT password 
                                      FROM admin 
                                      WHERE id = ? LIMIT 1")) {
            $stmt->bindParam(1, $user_id);
            $stmt->execute();  
            
            if ($stmt->rowCount() == 1) {
                $stmt->bindColumn(1, $password);
                $stmt->fetch();
                $login_check = hash('sha512', $password . $user_browser);
 
                if ($login_check == $login_string) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function esc_url($url) {
 
    if ('' == $url) {
        return $url;
    }
 
    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
 
    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;
 
    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }
 
    $url = str_replace(';//', '://', $url);
 
    $url = htmlentities($url);
 
    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);
 
    if ($url[0] !== '/') {
        // Nous ne voulons que les liens relatifs de $_SERVER['PHP_SELF']
        return '';
    } else {
        return $url;
    }
}


?>