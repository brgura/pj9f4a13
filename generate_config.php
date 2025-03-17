<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hostname = htmlspecialchars($_POST["hostname"]);
    $fa0_ip = htmlspecialchars($_POST["fa0_ip"]);
    $fa0_mask = htmlspecialchars($_POST["fa0_mask"]);
    $fa1_ip = htmlspecialchars($_POST["fa1_ip"]);
    $fa1_mask = htmlspecialchars($_POST["fa1_mask"]);
    $s0_ip = htmlspecialchars($_POST["s0_ip"]);
    $s0_mask = htmlspecialchars($_POST["s0_mask"]);
    $s0_clock = htmlspecialchars($_POST["s0_clock"]);
    $s1_ip = htmlspecialchars($_POST["s1_ip"]);
    $s1_mask = htmlspecialchars($_POST["s1_mask"]);
    $password = htmlspecialchars($_POST["password"]);
    $date = htmlspecialchars($_POST["date"]);
    $time = htmlspecialchars($_POST["time"]);

    echo "<pre>";
    echo "enable\n";
    echo "configure terminal\n";
    echo "hostname $hostname\n";
    echo "enable secret $password\n";
    echo "clock set $time $date\n";
    echo "interface FastEthernet0/0\n";
    echo "ip address $fa0_ip $fa0_mask\n";
    echo "no shutdown\n";
    echo "exit\n";
    echo "interface FastEthernet0/1\n";
    echo "ip address $fa1_ip $fa1_mask\n";
    echo "no shutdown\n";
    echo "exit\n";
    echo "interface Serial0/0/0\n";
    echo "ip address $s0_ip $s0_mask\n";
    echo "clock rate $s0_clock\n";
    echo "no shutdown\n";
    echo "exit\n";
    echo "interface Serial0/0/1\n";
    echo "ip address $s1_ip $s1_mask\n";
    echo "no shutdown\n";
    echo "exit\n";
    echo "write memory\n";
    echo "</pre>";
} else {
    echo "<form method='post'>
            Hostname: <input type='text' name='hostname' required><br>
            FastEthernet0/0 IP: <input type='text' name='fa0_ip' required> Mask: <input type='text' name='fa0_mask' required><br>
            FastEthernet0/1 IP: <input type='text' name='fa1_ip' required> Mask: <input type='text' name='fa1_mask' required><br>
            Serial0/0/0 IP: <input type='text' name='s0_ip' required> Mask: <input type='text' name='s0_mask' required> Clock Rate: <input type='text' name='s0_clock' required><br>
            Serial0/0/1 IP: <input type='text' name='s1_ip' required> Mask: <input type='text' name='s1_mask' required><br>
            Password (encriptada): <input type='password' name='password' required><br>
            Fecha (DD-MM-YYYY): <input type='text' name='date' required><br>
            Hora (HH:MM:SS): <input type='text' name='time' required><br>
            <input type='submit' value='Generar Configuración'>
          </form>";
}
?>

