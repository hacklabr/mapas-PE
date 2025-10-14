<?php
return [
    'app.offline' => env('OFFLINE', true) && date('Y-m-d H:i:s') < env('OFFLINE_UNTIL', '2025-10-14 12:00:00'),
    'app.offlineUrl' => '/em-breve/index.html',
    'app.offlineBypassFunction' => function() {
        $senha = $_GET['online'] ?? '';
        
        if ($senha === env('OFFLINE_BYPASS')) {
            $_SESSION['online'] = true;
        }

        return $_SESSION['online'] ?? false;
    }
];