<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hostname = $_POST["hostname"];
    $fa0_0_ip = $_POST["fa0_0_ip"];
    $fa0_0_mask = $_POST["fa0_0_mask"];
    $fa0_1_ip = $_POST["fa0_1_ip"];
    $fa0_1_mask = $_POST["fa0_1_mask"];
    $s0_0_0_ip = $_POST["s0_0_0_ip"];
    $s0_0_0_mask = $_POST["s0_0_0_mask"];
    $s0_0_0_clock = $_POST["s0_0_0_clock"];
    $s0_0_1_ip = $_POST["s0_0_1_ip"];
    $s0_0_1_mask = $_POST["s0_0_1_mask"];

    echo "<pre>";
    echo "enable\n";
    echo "configure terminal\n";
    echo "hostname $hostname\n";
    echo "enable secret cisco\n";
    echo "line vty 0 4\n";
    echo "password cisco\n";
    echo "login\n";
    echo "exit\n";
    echo "line console 0\n";
    echo "password cisco\n";
    echo "login\n";
    echo "exit\n";
    echo "interface FastEthernet0/0\n";
    echo "ip address $fa0_0_ip $fa0_0_mask\n";
    echo "no shutdown\n";
    echo "exit\n";
    echo "interface FastEthernet0/1\n";
    echo "ip address $fa0_1_ip $fa0_1_mask\n";
    echo "no shutdown\n";
    echo "exit\n";
    echo "interface Serial0/0/0\n";
    echo "ip address $s0_0_0_ip $s0_0_0_mask\n";
    echo "clock rate $s0_0_0_clock\n";
    echo "no shutdown\n";
    echo "exit\n";
    echo "interface Serial0/0/1\n";
    echo "ip address $s0_0_1_ip $s0_0_1_mask\n";
    echo "no shutdown\n";
    echo "exit\n";
    echo "copy running-config startup-config\n";
    echo "exit\n";
    echo "</pre>";
}
?>

