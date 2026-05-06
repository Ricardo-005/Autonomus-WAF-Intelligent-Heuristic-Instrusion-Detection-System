<?php
require_once 'config.php';
$totalAtaques = $pdo->query("SELECT COUNT(*) FROM waf_logs")->fetchColumn();
$stmt = $pdo->query("SELECT * FROM waf_logs ORDER BY created_at DESC LIMIT 20");
$logs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>WAF | Threat Intelligence Dashboard</title>
</head>
<body class="bg-slate-950 text-slate-200 p-8">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-end mb-10">
            <div>
                <h1 class="text-4xl font-black text-white tracking-tighter">SECURE<span class="text-emerald-500">SHIELD</span></h1>
                <p class="text-slate-500">Autonomous Intrusion Detection System</p>
            </div>
            <div class="text-right">
                <span class="text-xs font-bold text-slate-500 uppercase">Threats Mitigated</span>
                <div class="text-5xl font-mono text-emerald-400"><?= $totalAtaques ?></div>
            </div>
        </div>

        <div class="bg-slate-900 border border-slate-800 rounded-xl shadow-2xl overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-slate-800/50 text-slate-400 text-xs uppercase">
                    <tr>
                        <th class="p-4">Timestamp</th>
                        <th class="p-4">Source IP</th>
                        <th class="p-4">Threat Type</th>
                        <th class="p-4">Payload</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800">
                    <?php foreach ($logs as $log): ?>
                    <tr class="hover:bg-slate-800/30 transition-colors">
                        <td class="p-4 text-slate-500 text-sm"><?= $log['created_at'] ?></td>
                        <td class="p-4 font-mono text-emerald-500"><?= $log['ip_address'] ?></td>
                        <td class="p-4"><span class="bg-red-500/10 text-red-500 px-2 py-1 rounded text-xs font-bold">CRITICAL</span></td>
                        <td class="p-4 font-mono text-xs text-slate-400"><?= htmlspecialchars($log['payload']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>