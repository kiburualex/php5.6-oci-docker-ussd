<?php
# Obtain the data which is contained in 
# the post url no your server
$text = $_GET['USSD_STRING'];
$phone_number = $_GET['MSISDN'];
$service_code = $_GET['SERVICE_CODE'];

# we explode the text using the seperator '*' which 
# will give us an array

$level = explode("*", $text);
# check to see if the text has value to avoid errors
if(isset($text)){
    echo "has been set \n";
    echo "text is ".$text."\n";
    # 'CON' is used by the service provider to show continuity
    # of the request
    if($text == ""){
        $reponse = "CON Welcome to the registration portal.\n
        Please enter your full name";
    }else{
        if(isset($level[0]) && $level[0] != "" && !isset($level[1])){
            $reponse = "CON Hi ".$level[0].", enter your ward name";
        }else if(isset($level[1]) && $level[1] != "" && !isset($level[2])){
            $response = "CON Please enter your National ID number";
        }else if(isset($level[2]) && $level[2]!="" && !isset($level[3])){
            # save data somewhere
            $data = array(
                'phone_number' => $phone_number,
                'fullname' => $level[1],
                'electoral_ward' => $level[2],
                'national_id' => $level[3]
            );

            # insert into db if convenient

            # end the session using the keyword END
            $response = "END Thank you ".$level[1]." for registering.\nWe will keep you updated";
        }
    }

    header('Content-type: text/plain');
    echo $response;
}

?>