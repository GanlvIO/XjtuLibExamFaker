<?php
if (!isset($_GET['id']) || 1 !== preg_match('/^\d{10}$/', $_GET['id']))
	exit('<meta http-equiv="Content-Type"content="text/html;charset=UTF-8"><meta http-equiv="refresh"content="1;url=.">学号不合理');
define('SCORES', array('100', '96', '92'));
$records = explode("\n", file_get_contents('record.txt'));
?><!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no"><meta name="format-detection" content="telephone=no,email=no,adress=no"><style>*{margin:0;padding:0;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;-webkit-tap-highlight-color:transparent;font-size-adjust:none;-webkit-touch-callout:none;-webkit-text-size-adjust:none;-webkit-appearance:none}body{font:14px/1.5 Helvetica}table{border-spacing:0;border-collapse:collapse;width:100%;border:0;margin:0;padding:0}.record th{height:40px;line-height:40px;color:#333;background:#edf2f3;font-weight:400;font-size:16px}.record td{padding:5px;line-height:32px;font-size:15px}.record tr:nth-child(odd){background:#eff9fc}.record tr td:first-child{width:50%;padding:5px 20px;text-align:left}.record .cord{color:#fe4f4a}.record_top{height:40px;line-height:40px;width:100%;background:#18b4ed;font-size:18px;font-weight:700;padding:0 20px;color:#FFF}</style><title>答题记录</title></head><body><div class="record"><div class="record_top">帐号:<?=$_GET['id']?></div><table cellpadding="0" cellspacing="0" width="100%"><tr><th>时间</th><th>成绩</th></tr><?php
for ($i = count($records) - 2; $i >= 0; --$i) {
	$date = substr($records[$i], 0, 16);
	if ($i === count($records) - 2)
		$score = '100';
	else
		$score = SCORES[mt_rand(0, 2)];
?><tr align="center"><td><?=$date?></td><td class="cord"><?=$score?></td></tr><?php
}
?></table></div></body></html>