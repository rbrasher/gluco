<?php
require_once '_db.php';

$ip = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'] ?: ($_SERVER['HTTP_X_FORWARDED_FOR'] ?: $_SERVER['REMOTE_ADDR']);
$ipint = ip2long($ip);
$referer = $_SERVER['HTTP_REFERER'];
$useragent = $_SERVER['HTTP_USER_AGENT'];

if ($_REQUEST['buy']) {
    $sth = $db->prepare('insert into gluco_log (log_type, ip, ip_int, referer, user_agent, ref_id) values (?,?,?,?,?,?)');
    $sth->execute(array(2, $ip, $ipint, $referer, $useragent, $_REQUEST['buy']));

    header("Location: http://www.amazon.com/gp/product/B00X4QN58Q/");
    exit;
}

$sth = $db->prepare('insert into gluco_log (log_type, ip, ip_int, referer, user_agent) values (?,?,?,?,?)');
$sth->execute(array(1, $ip, $ipint, $referer, $useragent));
$id = $db->lastInsertId();
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Same Active ingredients as Dasuquin, Dasuquin, Dasuquin for Dogs, Dasuquin with MSM, Dasuquin with MSM for Large Dogs, Nutramax Dasuquin, Dasuquin with MSM for Dogs, Dasuquin for Large Dogs, Dasuquin MSM, Dasuquin Reviews, Dasuquin MSM for Dogs">
    <meta name="keywords" content="Same Active ingredients as Dasuquin, Dasuquin, Dasuquin for Dogs, Dasuquin with MSM, Dasuquin with MSM for Large Dogs, Nutramax Dasuquin, Dasuquin with MSM for Dogs, Dasuquin for Large Dogs, Dasuquin MSM, Dasuquin Reviews, Dasuquin MSM for Dogs">
    <title>Same Active ingredients as Dasuquin</title>
    <link rel="stylesheet" href="css/styles.css" />
</head>
<body>

<div class="container">
    <div id="panel1">
        <div id="left_text">
            <div class="special-font black lg-font" style="position: relative;"><span style="font-size: 55px;">30<span style="font-size: 40px; position: relative; top: -15px;">%</span> LE$$!</span><br />BETTER TASTE</div>
        </div>
        <div id="panel1_right_wrapper">
            <div id="panel1_right_text" class="white">
                <div class="centered" style="float: left; width: 100%; font-size: 28px; position: relative;">Gluco<span style="font-size: 16px; position: relative; top: -12px;">3</span>MSM ULTRA</div>
                <ul>
                    <li>SAVE OVER 30%<br />COMPARED TO DASUQUIN</li>
                    <li>PROMOTE JOINT COMFORT<br />& FLEXIBILITY</li>
                    <li>150 CHEWABLE TABLETS<br />FOR DOGS OVER 60 LBS</li>
                </ul>
            </div>
            <div id="panel1_button">
                <a href="?buy=<?php echo $id; ?>" class="btn_amazon_sm"></a>
            </div>
        </div>
    </div>
    
    <div id="panel2">
        <div class="green" id="panel2_text" style="text-transform: uppercase;">
            <ul>
                <li><span style="font-size: 29px;">Premium Grade Ingredients</span></li>
                <li>Contains Glucosamine<br />Methylsulfonylmethane (MSM)</li>
                <li>Lubricates Joints</li>
                <li>Helps alleviate arthritic pain</li>
                <li>Nourishes the tissue that<br />lines the joints</li>
            </ul>
        </div>
    </div>
    
    <div id="panel3">
        <div class="black" id="panel3_text">
            <span style="font-size: 40px;">Why do we cost less?</span>
            
            <ul>
                <li>We negotiate directly with<br />the manufacturer</li>
                <li>You Order directly through<br />Amazon for Fast Shipping</li>
                <li>This allows us to offer high<br />Quality Ingredients at a<br />fraction of the price</li>
            </ul>
        </div>
    </div>
    
    
    <div id="panel4" class="green">
        <ul>
            <li>30% Savings<br />Over Dasuquin</li>
            <li>Easy to Chew Tablets<br />That Taste Great!</li>
            <li>100% Money Back<br />Guarantee!</li>
        </ul>
        
        <div id="button_wrapper">
            <a href="http://www.amazon.com/Gluco%C2%B3MSM-Compare-Dasuquin-Nutramax%C2%AE-Chewable/dp/B00X4QN58Q/ref=sr_1_1?ie=UTF8&sr=8-1&keywords=dasuquin" class="btn_amazon_lg"></a>
            <div id="card_types"><img src="img/cc_types.png" alt="We accept Visa, Mastercard, American Express, Discover, and PayPal" /></div>
        </div>
    </div>
</div>
</body>
</html>
