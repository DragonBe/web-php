<?php
require("shared.inc");
commonHeader("Show Source");

if (!isset($page_url)) {
    echo "No page URL specified.";
    commonFooter();
    exit;
}
?>
Source of: <? echo $page_url; ?><BR>
<FONT SIZE=-1>
<B>IMPORTANT:</B> There are some restrictions on your use of the code and graphics on this site.<BR>
You should read the <A HREF="/COPYRIGHT.txt">copyright</A>.<BR>

<hr noshade>
<?
$legal_dirs = array(
    "/manual" => 1,
    "/include" => 1);

$dir = dirname($page_url);
if ($dir && $legal_dirs[$dir]) {
    $page_name = $DOCUMENT_ROOT . $page_url;
} else {
    $page_name = basename($page_url);
}

echo("<!-- $page_name -->\n");

if (file_exists($page_name) && !is_dir($page_name)) {
    show_source($page_name);
} else if (is_dir($page_name)) {
    echo "<P>No file specified.  Can't show source for a directory.</P>\n";
}

if (!strstr($page_name,"include/shared.inc")) {
?>
<hr noshade>
<P>
The syntax highlighted source is automatically generated by PHP from the plaintext script.<br>
If you're interested in what's behind the <B>commonHeader()</B> and <B>commonFooter</B> functions, 
you can always take a look at the <A HREF="/source.php?page_url=/include/shared.inc">
source of the shared.inc</A> file.  And, of course, if you want to see the source of this page, have
a look <A HREF="/source.php?page_url=/source.php">here</A>.
</P>
<?
}

commonFooter();
?>

