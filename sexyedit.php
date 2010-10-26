<?php
/*
Plugin Name: Sexy Add Template
Plugin URI: http://www.adwordsmogul.com/sexy-add-template
Description: Easy and convenient: this plugin allows you to easily add new page templates or css files into your current theme. The files become immediately accessible through your theme editor. Sexy!
Version: 1.0
Author: Jean "AdwordsMogul" Paul
Author URI: http://www.AdwordsMogul.com
License: GPL2
*/
?><?php
/*  Copyright 2010  Jean "AdwordsMogul" Paul  (email : jeanpaul@adwordsmogul.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?><?php

 function addTheSexyApp__AM(){
	 
	 
	 add_submenu_page( 'themes.php', 'Sexy Add Template', 'Sexy Add Template', 'manage_options', 'AM-sexy-handle', 'cleanSweeper_AM');
	 
 }
 
function cleanSweeper_AM(){

//This first if statement checks whether the user has created a newfile by checking the hidden field 'newfile' and by checking if the newfilename is not empty.
 if ($_POST['newfile'] == 'yes' && $_POST['AM_filename'] != ''){
	 $am_newfile = $_POST['AM_filename'];
$ourFileName = get_stylesheet_directory()."/$am_newfile";

//Let's check if the file already exists

if (file_exists($ourFileName)){
	echo '<div id="message" id="replyerror" ><p>File already exists. <a href="'.$_SERVER['PHP_SELF'].'?page=AM-sexy-handle" > Try a different filename</a></p></div>';

	return;
	
}

$ourFileHandle = fopen($ourFileName, 'w')  ;
$ourFileContent = fwrite($ourFileHandle, $_POST['AM_file_content']);
if ($ourFileContent){
fclose($ourFileHandle);	
echo '<div id="message" class="updated"><p>New sexy template added successfully. You can now edit it in your <a href="theme-editor.php">theme editor</a>.</p></div>';
 }else die("Can't create file");
 }


 echo '<div class="wrap">
<div   style="background-image:url(http://adwordsmogul.com/images/sexy48.jpg) ;" class="icon32"><br /></div>

<div style= "float: right; margin:50px 25px;" ><h3>Brought to you by:</h3><a href="http://www.AdwordsMogul.com" target="_blank" style="font-size: 18px;">AdwordsMogul.com<br/><br/><img src="http://adwordsmogul.com/images/3secretsbook.jpg" width="150" border="0" ></a></div>

<h2>Sexy Add Template</h2>
<br/>

<form action="'.$_SERVER['PHP_SELF'].'?page=AM-sexy-handle" method="post" enctype="multipart/form-data" >
<input type="hidden" name="newfile" value="yes" /> 
<label>
<strong>File name:</strong>
</label><label><input type = "text" size="40" name="AM_filename">
</label><label><input type="submit" value="Create new file/template" /></label><br/><br/>
<label>
<strong>File content:</strong><br/><br/>

<textarea name="AM_file_content" rows="25" cols="70" id="newcontent" ><?php
/*
Template Name: 
*/
?></textarea></label>';
  echo '</form>';
  echo '</div>';

}
 add_action('admin_menu','addTheSexyApp__AM');
?>