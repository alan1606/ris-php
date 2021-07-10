<?php
// First, import classes from the library as needed...
// use Aranyasen\HL7\Message; // If Message is used
// use Aranyasen\HL7\Segment; // If Segment is used
// use Aranyasen\HL7\Segments\MSH; // If MSH is used
// ... and so on
// echo 'culo';
// Create a Message object from a HL7 string
$msg = new Message("MSH|^~\\&|1|\rPID|||abcd|\r"); // Either \n or \r can be used as segment endings
$pid = $msg->getSegmentByIndex(1);
echo $pid->getField(3); // prints 'abcd'
echo $msg->toString(true); // Prints entire HL7 string

// Get the first segment
$msg->getFirstSegmentInstance('PID'); // Returns the first PID segment. Same as $msg->getSegmentsByName('PID')[0];

// Check if a segment is present in the message object
$msg->hasSegment('PID'); // return true or false based on whether PID is present in the $msg object

// Check if a message is empty
$msg = new Message();
$msg->isempty(); // Returns true

?>
