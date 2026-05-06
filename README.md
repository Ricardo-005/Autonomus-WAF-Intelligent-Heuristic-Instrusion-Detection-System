# Autonomus-WAF-Intelligent-Heuristic-Instrusion-Detection-System

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-00000f?style=for-the-badge&logo=mysql&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green.svg?style=for-the-badge)

This project is a custom-built Web Application Firewall (WAF) and Intrusion Detection System (IDS) developed in PHP. It is designed to intercept and analyze incoming HTTP traffic to mitigate common web vulnerabilities before they reach the application logic.
Unlike traditional signature-based firewalls, this system implements a Heuristic Scoring Engine that evaluates the risk level of each request based on character density, anomaly patterns, and known attack signatures (SQLi, XSS, and Path Traversal).

 *🚀 Key Features*
*   *🛡️ Real-Time Threat Mitigation:* Instant *403 Forbidden* response for high-risk payloads, stopping attackers in their tracks.
*   *🧠 Heuristic Analysis Engine:* Calculates a dynamic *"Risk Score"* for every request using advanced regex patterns and statistical anomaly detection.
*   *📊 Security Intelligence Dashboard:* A professional dark-mode interface to monitor blocked threats, visualize source IPs, and track attack vectors.
*   *📂 Forensic Logging:* Detailed database records of every incident, capturing payloads and timestamps for deep security analysis.
*   *⚡ Lightweight & Modular:* Designed for easy integration. Secure any PHP-based project by simply requiring a single core file.

---

### *🛠️ Getting Started*
Follow these steps to deploy the security shield in your local environment:

1.  *📥 Clone the repository:*
    bash
    git clone [https://github.com/tu-usuario/autonomous-waf.git](https://github.com/tu-usuario/autonomous-waf.git)
    
2.  *🗄️ Database Setup:*
    Import the database.sql file into your MySQL server (using *phpMyAdmin* or terminal).
3.  *⚙️ Configuration:*
    Open config.php and update your database credentials (host, dbname, user, password).
4.  *🔐 Activate Protection:*
    Include the engine at the very top of your main application file (e.g., index.php):
    php
    <?php require_once 'waf-engine.php'; ?>
    
5.  *🧪 Test the Shield:*
    Try visiting your-site.com/index.php?test=<script>alert(1)</script> to see the WAF in action!

[https://waf.wuaze.com/index.php](https://waf.wuaze.com/index.php)
