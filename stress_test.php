<?php
// stress_test.php - Professional Data Generator
require_once 'config.php';

$attack_types = [
    ['type' => 'SQL Injection', 'payload' => "admin' OR '1'='1' --"],
    ['type' => 'XSS Attack', 'payload' => "<script>alert('XSS_Test')</script>"],
    ['type' => 'Path Traversal', 'payload' => "../../../etc/passwd"],
    ['type' => 'Anomaly Detected', 'payload' => "$$$%%%^^^###!!!"],
    ['type' => 'SQL Injection', 'payload' => "UNION SELECT username, password FROM users"],
    ['type' => 'Remote Command Exec', 'payload' => "; rm -rf /"],
    ['type' => 'XSS Attack', 'payload' => "<img src=x onerror=alert(1)>"],
    ['type' => 'SQL Injection', 'payload' => "'; DROP TABLE logs; --"]
];

$ips = ['192.168.45.12', '10.0.0.5', '172.16.254.1', '201.248.1.10', '8.8.8.8'];

echo "<body style='background:#111; color:#0f0; font-family:monospace; padding:20px;'>";
echo "<h2>> Starting Security Stress Test...</h2>";

for ($i = 0; $i < 25; $i++) {
    $random_attack = $attack_types[array_rand($attack_types)];
    $random_ip = $ips[array_rand($ips)];
    $score = rand(70, 99) / 100;

    try {
        $stmt = $pdo->prepare("INSERT INTO waf_logs (ip_address, attack_type, payload, risk_score) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $random_ip, 
            $random_attack['type'], 
            htmlspecialchars($random_attack['payload']), 
            $score
        ]);
        echo "[$i] Incident Logged: " . $random_attack['type'] . " from " . $random_ip . "<br>";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

echo "<h3>> 25 Incidents injected successfully. Check your Dashboard!</h3>";
echo "</body>";