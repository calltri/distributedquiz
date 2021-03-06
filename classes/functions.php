<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/*
 * Author: Tristan Call
 * Date Created: 1/25/20
 * Last Updated: 1/25/20
 */

defined('MOODLE_INTERNAL') || die();

class mod_distributed_quiz_functions {
    
        /**
     * Sends out a notification 
     * 
     * $quizid
     */
    public static function send_notification ($quizid) {
        $message = new \core\message\message();
        $message->component = 'mod_distributed_quiz'; // Your plugin's name
        $message->name = 'created'; // Your notification name from message.php
        $message->userfrom = core_user::get_noreply_user(); // If the message is 'from' a specific user you can set them here
        $message->userto = $user;
        $message->subject = get_string('quizcreatednotificationmessage', 'distributed_quiz');
        $message->fullmessage = get_string('quizcreatednotificationmessage', 'distributed_quiz');
        $message->fullmessageformat = FORMAT_MARKDOWN;
        $message->fullmessagehtml = '<p>message body</p>';
        $message->notification = 1; // Because this is a notification generated from Moodle, not a user-to-user message
        $message->contexturl = (new \moodle_url(get_string('quizurl', 'distributed_quiz', $quizid)))->out(false); // A relevant URL for the notification
        $message->contexturlname = 'Course list'; // Link title explaining where users get to for the contexturl
        
        
        // Actually send the message
        $messageid = message_send($message);
    }
    
}