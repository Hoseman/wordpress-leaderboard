<?php



$points_1 = "";

$points_2 = "";

$points_3 = ""; 

$points_4 = "";

$points_5 = "";

$points_6 = "";

$points_7 = "";

$points_8 = "";

$points_9 = "";

$points_10 = "";

$points_11 = "";

$points_12 = "";

$points_13 = "";

$points_14 = "";

$points_15 = "";

$points_16 = "";

$points_17 = "";

$points_18 = "";

$points_19 = "";

$points_20 = "";









if (isset($_POST['formid']) && isset($_SESSION['formid']) && $_POST["formid"] == $_SESSION["formid"]) {











    //$message = "All OK";



    $_SESSION["formid"] = '';



    if(isset($_POST['dealer_id'])) {

        $dealer_id = sanitize_text_field($_POST['dealer_id']);

    }



    if ($dealer_id == "Please Choose...") {

        echo '<p class="input-error">You must add a dealer! Return and try again</p>';

        exit;

    }



    if(isset($_POST['sales_person'])) {

        $salesman = sanitize_text_field($_POST['sales_person']);

    }

    else {

        $salesman = "";

        echo '<p class="input-error">You must add a sales person...Return and try again!</p>';

        exit;

    }



    if(isset($_POST['customername'])&&!empty($_POST['customername'])) {

        $customername = sanitize_text_field($_POST['customername']);

    }



    else {

        $customername = "";

        echo '<p class="input-error">You must add a customer name...Return and try again!</p>';

        exit;

    }



    if(isset($_POST['date'])&&!empty($_POST['date'])) {

        $date = sanitize_text_field($_POST['date']);

    }



    else {

        $date = "";

        echo '<p class="input-error">You must add a date...Return and try again!</p>';

        exit;

    }













    function update_leaderboard_scores() {

        global $wpdb;









        // count the number of scores in lb_point_types

        //global $wpdb;

        $valid = true;

        $x = 1;

        $SQL3 = "SELECT * FROM " . $wpdb->prefix . "lb_point_types;";

        $formData3 = $wpdb-> get_results($SQL3);

        if (!$formData3) {

            $valid = false;

            echo $error =  '<p>No results to display</p>';

        }

        $numRows = $wpdb->get_var( "SELECT count(*) FROM " . $wpdb->prefix . "lb_point_types;");

        if($valid) {

            foreach ($wpdb->get_results($SQL3) as $key => $row) {

                $count =  $x++;

                $count;

                $id = $row->id;

                $description = $row->description;

                $score_name_array[] = $row->description;

            }

        }



        // count the number of scores in lb_point_types





        If(empty($score_name_array[0])) { $score_name_array[0] = ""; }

        If(empty($score_name_array[1])) { $score_name_array[1] = ""; }

        If(empty($score_name_array[2])) { $score_name_array[2] = ""; }

        If(empty($score_name_array[3])) { $score_name_array[3] = ""; }

        If(empty($score_name_array[4])) { $score_name_array[4] = ""; }

        If(empty($score_name_array[5])) { $score_name_array[5] = ""; }

        If(empty($score_name_array[6])) { $score_name_array[6] = ""; }

        If(empty($score_name_array[7])) { $score_name_array[7] = ""; }

        If(empty($score_name_array[8])) { $score_name_array[8] = ""; }

        If(empty($score_name_array[9])) { $score_name_array[9] = ""; }

        If(empty($score_name_array[10])) { $score_name_array[10] = ""; }

        If(empty($score_name_array[11])) { $score_name_array[11] = ""; }

        If(empty($score_name_array[12])) { $score_name_array[12] = ""; }

        If(empty($score_name_array[13])) { $score_name_array[13] = ""; }

        If(empty($score_name_array[14])) { $score_name_array[14] = ""; }

        If(empty($score_name_array[15])) { $score_name_array[15] = ""; }

        If(empty($score_name_array[16])) { $score_name_array[16] = ""; }

        If(empty($score_name_array[17])) { $score_name_array[17] = ""; }

        If(empty($score_name_array[18])) { $score_name_array[18] = ""; }

        If(empty($score_name_array[19])) { $score_name_array[19] = ""; }









        $table = $wpdb->prefix . 'lbv4_results';





        if(isset($_POST['dealer_id'])) {

            $dealer_id = sanitize_text_field($_POST['dealer_id']);



            //Grab the dealer name from the database



            $valid = true;

            $SQL = "SELECT * FROM " . $wpdb->prefix . "lb_dealers WHERE id =$dealer_id";

            $formData = $wpdb-> get_results($SQL);

            $array = array();

            if (!$formData) {

                $valid = false;

                echo '<tr><td colspan="3" style="text-align:center;">No results to display!</td></tr>';

            }

            if($valid) {

                foreach ($wpdb->get_results($SQL) as $key => $row) {



                    $dealer_name = $row->dealer;

                }

            }



            //Grab the dealer name from the database





        }





        if(isset($_POST['sales_person'])) {

            $salesman = sanitize_text_field($_POST['sales_person']);

        }

        if(isset($_POST['customername'])) {

            $customername = sanitize_text_field($_POST['customername']);

        }

        if(isset($_POST['date'])) {

            $date = sanitize_text_field($_POST['date']);

        }



        if(isset($_POST['points_1'])) {

            $points_1 = sanitize_text_field($_POST['points_1']);

            $points_description_1 = $score_name_array[0];

        }

        else {

            $points_1 = 0;

            $points_description_1 = "";

        }



        if(isset($_POST['points_2'])) {

            $points_2 = sanitize_text_field($_POST['points_2']);

            $points_description_2 = $score_name_array[1];

        }

        else {

            $points_2 = 0;

            $points_description_2 = "";

        }



        if(isset($_POST['points_3'])) {

            $points_3 = sanitize_text_field($_POST['points_3']);

            $points_description_3 = $score_name_array[2];

        }

        else {

            $points_3 = 0;

            $points_description_3 = "";

        }



        if(isset($_POST['points_4'])) {

            $points_4 = sanitize_text_field($_POST['points_4']);

            $points_description_4 = $score_name_array[3];

        }

        else {

            $points_4 = 0;

            $points_description_4 = "";

        }



        if(isset($_POST['points_5'])) {

            $points_5 = sanitize_text_field($_POST['points_5']);

            $points_description_5 = $score_name_array[4];

        }

        else {

            $points_5 = 0;

            $points_description_5 = "";

        }



        if(isset($_POST['points_6'])) {

            $points_6 = sanitize_text_field($_POST['points_6']);

            $points_description_6 = $score_name_array[5];

        }

        else {

            $points_6 = 0;

            $points_description_6 = "";

        }



        if(isset($_POST['points_7'])) {

            $points_7 = sanitize_text_field($_POST['points_7']);

            $points_description_7 = $score_name_array[6];

        }

        else {

            $points_7 = 0;

            $points_description_7 = "";

        }



        if(isset($_POST['points_8'])) {

            $points_8 = sanitize_text_field($_POST['points_8']);

            $points_description_8 = $score_name_array[7];

        }

        else {

            $points_8 = 0;

            $points_description_8 = "";

        }



        if(isset($_POST['points_9'])) {

            $points_9 = sanitize_text_field($_POST['points_9']);

            $points_description_9 = $score_name_array[8];

        }

        else {

            $points_9 = 0;

            $points_description_9 = "";

        }



        if(isset($_POST['points_10'])) {

            $points_10 = sanitize_text_field($_POST['points_10']);

            $points_description_10 = $score_name_array[9];

        }

        else {

            $points_10 = 0;

            $points_description_10 = "";

        }



        if(isset($_POST['points_11'])) {

            $points_11 = sanitize_text_field($_POST['points_11']);

            $points_description_11 = $score_name_array[10];

        }

        else {

            $points_11 = 0;

            $points_description_11 = "";

        }



        if(isset($_POST['points_12'])) {

            $points_12 = sanitize_text_field($_POST['points_12']);

            $points_description_12 = $score_name_array[11];

        }

        else {

            $points_12 = 0;

            $points_description_12 = "";

        }



        if(isset($_POST['points_13'])) {

            $points_13 = sanitize_text_field($_POST['points_13']);

            $points_description_13 = $score_name_array[12];

        }

        else {

            $points_13 = 0;

            $points_description_13 = "";

        }



        if(isset($_POST['points_14'])) {

            $points_14 = sanitize_text_field($_POST['points_14']);

            $points_description_14 = $score_name_array[13];

        }

        else {

            $points_14 = 0;

            $points_description_14 = "";

        }



        if(isset($_POST['points_15'])) {

            $points_15 = sanitize_text_field($_POST['points_15']);

            $points_description_15 = $score_name_array[14];

        }

        else {

            $points_15 = 0;

            $points_description_15 = "";

        }



        if(isset($_POST['points_16'])) {

            $points_16 = sanitize_text_field($_POST['points_16']);

            $points_description_16 = $score_name_array[15];

        }

        else {

            $points_16 = 0;

            $points_description_16 = "";

        }



        if(isset($_POST['points_17'])) {

            $points_17 = sanitize_text_field($_POST['points_17']);

            $points_description_17 = $score_name_array[16];

        }

        else {

            $points_17 = 0;

            $points_description_17 = "";

        }



        if(isset($_POST['points_18'])) {

            $points_18 = sanitize_text_field($_POST['points_18']);

            $points_description_18 = $score_name_array[17];

        }

        else {

            $points_18 = 0;

            $points_description_18 = "";

        }



        if(isset($_POST['points_19'])) {

            $points_19 = sanitize_text_field($_POST['points_19']);

            $points_description_19 = $score_name_array[18];

        }

        else {

            $points_19 = 0;

            $points_description_19 = "";

        }



        if(isset($_POST['points_20'])) {

            $points_20 = sanitize_text_field($_POST['points_20']);

            $points_description_20 = $score_name_array[19];

        }

        else {

            $points_20 = 0;

            $points_description_20 = "";

        }









        //echo $dealer . "<br>" . $salesman . "<br>" . $salesman . "<br>" . $customername . "<br>" . $date . "<br>" . $points_1 . "<br>" . $points_2 . "<br>" . $points_3 . "<br>" . $points_4 . "<br>" . $points_5 . "<br>" . $points_6 . "<br>" . $points_7 . "<br>" . $points_8 . "<br>" . $points_9 . "<br>" . $points_10;





        $myvalue = preg_replace('/[0-9]+/', '', $salesman);

		$mydate = date('Y-m-d H:i:s');



        //exit;



        $wpdb->insert(

            $table, //Table

            array(

                'dealer' => $dealer_name,

                'sales_person' => $myvalue,

                'customername' => $customername,

                'orderdate' => $date,

				'ContactDateCreated' => $mydate,

                'points_1' => $points_1,

                'points_2' => $points_2,

                'points_3' => $points_3,

                'points_4' => $points_4,

                'points_5' => $points_5,

                'points_6' => $points_6,

                'points_7' => $points_7,

                'points_8' => $points_8,

                'points_9' => $points_9,

                'points_10' => $points_10,

                'points_11' => $points_11,

                'points_12' => $points_12,

                'points_13' => $points_13,

                'points_14' => $points_14,

                'points_15' => $points_15,

                'points_16' => $points_16,

                'points_17' => $points_17,

                'points_18' => $points_18,

                'points_19' => $points_19,

                'points_20' => $points_20

            ), //Variables

            array('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s') //data format

			

        );























        // Get the email from

        global $wpdb;



        $valid = true;

        $SQL = "SELECT * FROM " . $wpdb->prefix . "lb_email_from;";

        $formData = $wpdb-> get_results($SQL);





        if (!$formData) {

            $valid = false;

            echo $error =  '<p>No results to display</p>';

        }



        if($valid) {

            foreach ($wpdb->get_results($SQL) as $key => $row) {

                $message1 = $row->from_name;

                $message2 = $row->from_email;

            }

        }

        // end get the email subject









        // Get the email subject

        global $wpdb;



        $valid = true;

        $SQL = "SELECT * FROM " . $wpdb->prefix . "lb_email;";

        $formData = $wpdb-> get_results($SQL);





        if (!$formData) {

            $valid = false;

            echo $error =  '<p>No results to display</p>';

        }



        if($valid) {

            foreach ($wpdb->get_results($SQL) as $key => $row) {

                $id = $row->id;

                $subject = $row->subject;

            }

        }

        // end get the email subject







        // get the email address



        $array[0]['email_address'] = "";

        $array[1]['email_address'] = "";

        $array[2]['email_address'] = "";



        // count the results

        $rowcount = $wpdb->get_var( "SELECT count(*) FROM " . $wpdb->prefix . "lb_email_results;");



        global $wpdb;



        $valid2 = true;

        $SQL2 = "SELECT * FROM " . $wpdb->prefix . "lb_email_results;";

        $formData2 = $wpdb-> get_results($SQL2);

        $array = array();



        if (!$formData2) {

            $valid = false;

            echo $error =  '<p>No results to display</p>';

        }



        if($valid2) {

            foreach ($wpdb->get_results($SQL2) as $key => $row) {

                //echo "<span style='color:blue;'>" . $email_address = $row->email_address . "</span>";

                $array[] = $row->email_address;

                if(!empty($array[0])) {

                    $email_1 = $array[0];

                }

                if(!empty($array[1])) {

                    $email_2 = $array[1];

                }

                if(!empty($array[2])) {

                    $email_3 = $array[2];

                }



                //Send the score results by email (Maximum of 3)

                if ($rowcount == 1) {

                    @$to = $email_1;

                }

                elseif ($rowcount == 2) {

                    @$to = $email_1 . "," . $email_2;

                }

                elseif ($rowcount == 3) {

                    @$to = $email_1 . "," . $email_2 . "," .  $email_3;

                }





            }

        }













        // end get the email address



        //echo $email_address;





        $message = esc_textarea( "The following information has been sent:\r\n");

        $message .= esc_textarea( "\r\n" );

        $message .= esc_textarea( "Dealer: " . $dealer_name . "\r\n" );

        $message .= esc_textarea( "Name: " . $salesman . "\r\n" );

        $message .= esc_textarea( "Customer Name: " . $customername . "\r\n" );

        $message .= esc_textarea( "Date: " . $date . "\r\n" );

        $message .= esc_textarea( "\r\n" );

        $message .= esc_textarea( "Points submitted: \r\n" );

        $message .= esc_textarea( "\r\n" );

        if($points_1 != 0) { $message .= esc_textarea( $points_description_1 ." = ". $points_1 . "\r\n" ); }

        if($points_2 != 0) { $message .= esc_textarea( $points_description_2 ." = ". $points_2 . "\r\n" ); }

        if($points_3 != 0) { $message .= esc_textarea( $points_description_3 ." = ". $points_3 . "\r\n" ); }

        if($points_4 != 0) { $message .= esc_textarea( $points_description_4 ." = ". $points_4 . "\r\n" ); }

        if($points_5 != 0) { $message .= esc_textarea( $points_description_5 ." = ". $points_5 . "\r\n" ); }

        if($points_6 != 0) { $message .= esc_textarea( $points_description_6 ." = ". $points_6 . "\r\n" ); }

        if($points_7 != 0) { $message .= esc_textarea( $points_description_7 ." = ". $points_7 . "\r\n" ); }

        if($points_8 != 0) { $message .= esc_textarea( $points_description_8 ." = ". $points_8 . "\r\n" ); }

        if($points_9 != 0) { $message .= esc_textarea( $points_description_9 ." = ". $points_9 . "\r\n" ); }

        if($points_10 != 0) { $message .= esc_textarea( $points_description_10 ." = ". $points_10 . "\r\n" ); }

        if($points_11 != 0) { $message .= esc_textarea( $points_description_11 ." = ". $points_11 . "\r\n" ); }

        if($points_12 != 0) { $message .= esc_textarea( $points_description_12 ." = ". $points_12 . "\r\n" ); }

        if($points_13 != 0) { $message .= esc_textarea( $points_description_13 ." = ". $points_13 . "\r\n" ); }

        if($points_14 != 0) { $message .= esc_textarea( $points_description_14 ." = ". $points_14 . "\r\n" ); }

        if($points_15 != 0) { $message .= esc_textarea( $points_description_15 ." = ". $points_15 . "\r\n" ); }

        if($points_16 != 0) { $message .= esc_textarea( $points_description_16 ." = ". $points_16 . "\r\n" ); }

        if($points_17 != 0) { $message .= esc_textarea( $points_description_17 ." = ". $points_17 . "\r\n" ); }

        if($points_18 != 0) { $message .= esc_textarea( $points_description_18 ." = ". $points_18 . "\r\n" ); }

        if($points_19 != 0) { $message .= esc_textarea( $points_description_19 ." = ". $points_19 . "\r\n" ); }

        if($points_20 != 0) { $message .= esc_textarea( $points_description_20 ." = ". $points_20 . "\r\n" ); }







        //Email the results

        $headers = "From: $message1 <$message2>" . "\r\n";



        // If email has been processed for sending, display a success message

        if ( wp_mail( $to, $subject, $message, $headers ) ) {

            echo '<div class="col-sm-12 success-wrapper">';

            echo '<span class="glyphicon glyphicon-ok"></span><span class="success-message">Your points have been submitted. Please check the leaderboard!</span>';

            echo '</div>';

        } else {

            echo '<div class="col-sm-12 error-wrapper">';

            echo '<span class="glyphicon glyphicon-remove"></span><span class="success-message">Error.. Your points could not be emailed!</span>';

            echo '</div>';

        }



        $_SESSION["formid"] = md5(rand(0,10000000));

    } // end function





    update_leaderboard_scores();









	

	

			

		

	

	

	

		}

		else {

			$_SESSION["formid"] = md5(rand(0,10000000));

		}

		//end if

	



?>