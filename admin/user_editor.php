<?php
error_reporting(6135);$Jb=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($Jb||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$W){$Re=filter_input_array(constant("INPUT$W"),FILTER_UNSAFE_RAW);if($Re)$$W=$Re;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");function
connection(){global$f;return$f;}function
adminer(){global$b;return$b;}function
version(){global$ca;return$ca;}function
idf_unescape($t){$_c=substr($t,-1);return
str_replace($_c.$_c,$_c,substr($t,1,-1));}function
escape_string($W){return
substr(q($W),1,-1);}function
number($W){return
preg_replace('~[^0-9]+~','',$W);}function
number_type(){return'((?<!o)int(?!er)|numeric|real|float|double|decimal|money)';}function
remove_slashes($yd,$Jb=false){if(get_magic_quotes_gpc()){while(list($x,$W)=each($yd)){foreach($W
as$uc=>$V){unset($yd[$x][$uc]);if(is_array($V)){$yd[$x][stripslashes($uc)]=$V;$yd[]=&$yd[$x][stripslashes($uc)];}else$yd[$x][stripslashes($uc)]=($Jb?$V:stripslashes($V));}}}}function
bracket_escape($t,$ua=false){static$Ge=array(':'=>':1',']'=>':2','['=>':3','"'=>':4');return
strtr($t,($ua?array_flip($Ge):$Ge));}function
min_version($Ze,$Ic="",$g=null){global$f;if(!$g)$g=$f;$Wd=$g->server_info;if($Ic&&preg_match('~([\d.]+)-MariaDB~',$Wd,$A)){$Wd=$A[1];$Ze=$Ic;}return(version_compare($Wd,$Ze)>=0);}function
charset($f){return(min_version("5.5.3",0,$f)?"utf8mb4":"utf8");}function
script($de,$Fe="\n"){return"<script".nonce().">$de</script>$Fe";}function
script_src($We){return"<script src='".h($We)."'".nonce()."></script>\n";}function
nonce(){return' nonce="'.get_nonce().'"';}function
target_blank(){return' target="_blank" rel="noreferrer noopener"';}function
h($R){return
str_replace("\0","&#0;",htmlspecialchars($R,ENT_QUOTES,'utf-8'));}function
nl_br($R){return
str_replace("\n","<br>",$R);}function
checkbox($D,$X,$Fa,$xc="",$cd="",$Ia="",$yc=""){$L="<input type='checkbox' name='$D' value='".h($X)."'".($Fa?" checked":"").($yc?" aria-labelledby='$yc'":"").">".($cd?script("qsl('input').onclick = function () { $cd };",""):"");return($xc!=""||$Ia?"<label".($Ia?" class='$Ia'":"").">$L".h($xc)."</label>":$L);}function
optionlist($E,$Rd=null,$Xe=false){$L="";foreach($E
as$uc=>$V){$gd=array($uc=>$V);if(is_array($V)){$L.='<optgroup label="'.h($uc).'">';$gd=$V;}foreach($gd
as$x=>$W)$L.='<option'.($Xe||is_string($x)?' value="'.h($x).'"':'').(($Xe||is_string($x)?(string)$x:$W)===$Rd?' selected':'').'>'.h($W);if(is_array($V))$L.='</optgroup>';}return$L;}function
html_select($D,$E,$X="",$bd=true,$yc=""){if($bd)return"<select name='".h($D)."'".($yc?" aria-labelledby='$yc'":"").">".optionlist($E,$X)."</select>".(is_string($bd)?script("qsl('select').onchange = function () { $bd };",""):"");$L="";foreach($E
as$x=>$W)$L.="<label><input type='radio' name='".h($D)."' value='".h($x)."'".($x==$X?" checked":"").">".h($W)."</label>";return$L;}function
select_input($c,$E,$X="",$bd="",$qd=""){$te=($E?"select":"input");return"<$te$c".($E?"><option value=''>$qd".optionlist($E,$X,true)."</select>":" size='10' value='".h($X)."' placeholder='$qd'>").($bd?script("qsl('$te').onchange = $bd;",""):"");}function
confirm($B="",$Sd="qsl('input')"){return
script("$Sd.onclick = function () { return confirm('".($B?js_escape($B):'Are you sure?')."'); };","");}function
print_fieldset($s,$Bc,$cf=false){echo"<fieldset><legend>","<a href='#fieldset-$s'>$Bc</a>",script("qsl('a').onclick = partial(toggle, 'fieldset-$s');",""),"</legend>","<div id='fieldset-$s'".($cf?"":" class='hidden'").">\n";}function
bold($Aa,$Ia=""){return($Aa?" class='active $Ia'":($Ia?" class='$Ia'":""));}function
odd($L=' class="odd"'){static$r=0;if(!$L)$r=-1;return($r++%2?$L:'');}function
js_escape($R){return
addcslashes($R,"\r\n'\\/");}function
json_row($x,$W=null){static$Kb=true;if($Kb)echo"{";if($x!=""){echo($Kb?"":",")."\n\t\"".addcslashes($x,"\r\n\t\"\\/").'": '.($W!==null?'"'.addcslashes($W,"\r\n\"\\/").'"':'null');$Kb=false;}else{echo"\n}\n";$Kb=true;}}function
ini_bool($oc){$W=ini_get($oc);return(preg_match('~^(on|true|yes)$~i',$W)||(int)$W);}function
sid(){static$L;if($L===null)$L=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$L;}function
set_password($Y,$P,$U,$H){$_SESSION["pwds"][$Y][$P][$U]=($_COOKIE["adminer_key"]&&is_string($H)?array(encrypt_string($H,$_COOKIE["adminer_key"])):$H);}function
get_password(){$L=get_session("pwds");if(is_array($L))$L=($_COOKIE["adminer_key"]?decrypt_string($L[0],$_COOKIE["adminer_key"]):false);return$L;}function
q($R){global$f;return$f->quote($R);}function
get_vals($J,$d=0){global$f;$L=array();$K=$f->query($J);if(is_object($K)){while($M=$K->fetch_row())$L[]=$M[$d];}return$L;}function
get_key_vals($J,$g=null,$Zd=true){global$f;if(!is_object($g))$g=$f;$L=array();$K=$g->query($J);if(is_object($K)){while($M=$K->fetch_row()){if($Zd)$L[$M[0]]=$M[1];else$L[]=$M[0];}}return$L;}function
get_rows($J,$g=null,$k="<p class='error'>"){global$f;$Sa=(is_object($g)?$g:$f);$L=array();$K=$Sa->query($J);if(is_object($K)){while($M=$K->fetch_assoc())$L[]=$M;}elseif(!$K&&!is_object($g)&&$k&&defined("PAGE_HEADER"))echo$k.error()."\n";return$L;}function
unique_array($M,$u){foreach($u
as$mc){if(preg_match("~PRIMARY|UNIQUE~",$mc["type"])){$L=array();foreach($mc["columns"]as$x){if(!isset($M[$x]))continue
2;$L[$x]=$M[$x];}return$L;}}}function
escape_key($x){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$x,$A))return$A[1].idf_escape(idf_unescape($A[2])).$A[3];return
idf_escape($x);}function
where($Z,$m=array()){global$f,$w;$L=array();foreach((array)$Z["where"]as$x=>$W){$x=bracket_escape($x,1);$d=escape_key($x);$L[]=$d.($w=="sql"&&preg_match('~^[0-9]*\.[0-9]*$~',$W)?" LIKE ".q(addcslashes($W,"%_\\")):($w=="mssql"?" LIKE ".q(preg_replace('~[_%[]~','[\0]',$W)):" = ".unconvert_field($m[$x],q($W))));if($w=="sql"&&preg_match('~char|text~',$m[$x]["type"])&&preg_match("~[^ -@]~",$W))$L[]="$d = ".q($W)." COLLATE ".charset($f)."_bin";}foreach((array)$Z["null"]as$x)$L[]=escape_key($x)." IS NULL";return
implode(" AND ",$L);}function
where_check($W,$m=array()){parse_str($W,$Ea);remove_slashes(array(&$Ea));return
where($Ea,$m);}function
where_link($r,$d,$X,$ed="="){return"&where%5B$r%5D%5Bcol%5D=".urlencode($d)."&where%5B$r%5D%5Bop%5D=".urlencode(($X!==null?$ed:"IS NULL"))."&where%5B$r%5D%5Bval%5D=".urlencode($X);}function
convert_fields($e,$m,$O=array()){$L="";foreach($e
as$x=>$W){if($O&&!in_array(idf_escape($x),$O))continue;$oa=convert_field($m[$x]);if($oa)$L.=", $oa AS ".idf_escape($x);}return$L;}function
cookie($D,$X,$Ec=2592000){global$aa;return
header("Set-Cookie: $D=".urlencode($X).($Ec?"; expires=".gmdate("D, d M Y H:i:s",time()+$Ec)." GMT":"")."; path=".preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]).($aa?"; secure":"")."; HttpOnly; SameSite=lax",false);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session($Mb=false){if(!ini_bool("session.use_cookies")||($Mb&&@ini_set("session.use_cookies",false)!==false))session_write_close();}function&get_session($x){return$_SESSION[$x][DRIVER][SERVER][$_GET["username"]];}function
set_session($x,$W){$_SESSION[$x][DRIVER][SERVER][$_GET["username"]]=$W;}function
auth_url($Y,$P,$U,$h=null){global$mb;preg_match('~([^?]*)\??(.*)~',remove_from_uri(implode("|",array_keys($mb))."|username|".($h!==null?"db|":"").session_name()),$A);return"$A[1]?".(sid()?SID."&":"").($Y!="server"||$P!=""?urlencode($Y)."=".urlencode($P)."&":"")."username=".urlencode($U).($h!=""?"&db=".urlencode($h):"").($A[2]?"&$A[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($_,$B=null){if($B!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($_!==null?$_:$_SERVER["REQUEST_URI"]))][]=$B;}if($_!==null){if($_=="")$_=".";header("Location: $_");exit;}}function
query_redirect($J,$_,$B,$Fd=true,$Bb=true,$Eb=false,$ye=""){global$f,$k,$b;if($Bb){$he=microtime(true);$Eb=!$f->query($J);$ye=format_time($he);}$fe="";if($J)$fe=$b->messageQuery($J,$ye,$Eb);if($Eb){$k=error().$fe.script("messagesPrint();");return
false;}if($Fd)redirect($_,$B.$fe);return
true;}function
queries($J){global$f;static$Ad=array();static$he;if(!$he)$he=microtime(true);if($J===null)return
array(implode("\n",$Ad),format_time($he));$Ad[]=(preg_match('~;$~',$J)?"DELIMITER ;;\n$J;\nDELIMITER ":$J).";";return$f->query($J);}function
apply_queries($J,$se,$zb='table'){foreach($se
as$S){if(!queries("$J ".$zb($S)))return
false;}return
true;}function
queries_redirect($_,$B,$Fd){list($Ad,$ye)=queries(null);return
query_redirect($Ad,$_,$B,$Fd,false,!$Fd,$ye);}function
format_time($he){return
sprintf('%.3f s',max(0,microtime(true)-$he));}function
remove_from_uri($md=""){return
substr(preg_replace("~(?<=[?&])($md".(SID?"":"|".session_name()).")=[^&]*&~",'',"$_SERVER[REQUEST_URI]&"),0,-1);}function
pagination($G,$ab){return" ".($G==$ab?$G+1:'<a href="'.h(remove_from_uri("page").($G?"&page=$G".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($G+1)."</a>");}function
get_file($x,$eb=false){$Hb=$_FILES[$x];if(!$Hb)return
null;foreach($Hb
as$x=>$W)$Hb[$x]=(array)$W;$L='';foreach($Hb["error"]as$x=>$k){if($k)return$k;$D=$Hb["name"][$x];$De=$Hb["tmp_name"][$x];$Ta=file_get_contents($eb&&preg_match('~\.gz$~',$D)?"compress.zlib://$De":$De);if($eb){$he=substr($Ta,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$he,$Gd))$Ta=iconv("utf-16","utf-8",$Ta);elseif($he=="\xEF\xBB\xBF")$Ta=substr($Ta,3);$L.=$Ta."\n\n";}else$L.=$Ta;}return$L;}function
upload_error($k){$Mc=($k==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($k?'Unable to upload a file.'.($Mc?" ".sprintf('Maximum allowed file size is %sB.',$Mc):""):'File does not exist.');}function
repeat_pattern($I,$Cc){return
str_repeat("$I{0,65535}",$Cc/65535)."$I{0,".($Cc%65535)."}";}function
is_utf8($W){return(preg_match('~~u',$W)&&!preg_match('~[\0-\x8\xB\xC\xE-\x1F]~',$W));}function
shorten_utf8($R,$Cc=80,$ne=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{10FFFF}]",$Cc).")($)?)u",$R,$A))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$Cc).")($)?)",$R,$A);return
h($A[1]).$ne.(isset($A[2])?"":"<i>…</i>");}function
format_number($W){return
strtr(number_format($W,0,".",','),preg_split('~~u','0123456789',-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($W){return
preg_replace('~[^a-z0-9_]~i','-',$W);}function
hidden_fields($yd,$lc=array()){$L=false;while(list($x,$W)=each($yd)){if(!in_array($x,$lc)){if(is_array($W)){foreach($W
as$uc=>$V)$yd[$x."[$uc]"]=$V;}else{$L=true;echo'<input type="hidden" name="'.h($x).'" value="'.h($W).'">';}}}return$L;}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($S,$Fb=false){$L=table_status($S,$Fb);return($L?$L:array("Name"=>$S));}function
column_foreign_keys($S){global$b;$L=array();foreach($b->foreignKeys($S)as$Qb){foreach($Qb["source"]as$W)$L[$W][]=$Qb;}return$L;}function
enum_input($Ke,$c,$l,$X,$vb=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$l["length"],$Jc);$L=($vb!==null?"<label><input type='$Ke'$c value='$vb'".((is_array($X)?in_array($vb,$X):$X===0)?" checked":"")."><i>".'empty'."</i></label>":"");foreach($Jc[1]as$r=>$W){$W=stripcslashes(str_replace("''","'",$W));$Fa=(is_int($X)?$X==$r+1:(is_array($X)?in_array($r+1,$X):$X===$W));$L.=" <label><input type='$Ke'$c value='".($r+1)."'".($Fa?' checked':'').'>'.h($b->editVal($W,$l)).'</label>';}return$L;}function
input($l,$X,$p){global$Me,$b,$w;$D=h(bracket_escape($l["field"]));echo"<td class='function'>";if(is_array($X)&&!$p){$na=array($X);if(version_compare(PHP_VERSION,5.4)>=0)$na[]=JSON_PRETTY_PRINT;$X=call_user_func_array('json_encode',$na);$p="json";}$Jd=($w=="mssql"&&$l["auto_increment"]);if($Jd&&!$_POST["save"])$p=null;$Vb=(isset($_GET["select"])||$Jd?array("orig"=>'original'):array())+$b->editFunctions($l);$c=" name='fields[$D]'";if($l["type"]=="enum")echo
h($Vb[""])."<td>".$b->editInput($_GET["edit"],$l,$c,$X);else{$bc=(in_array($p,$Vb)||isset($Vb[$p]));echo(count($Vb)>1?"<select name='function[$D]'>".optionlist($Vb,$p===null||$bc?$p:"")."</select>".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).script("qsl('select').onchange = functionChange;",""):h(reset($Vb))).'<td>';$qc=$b->editInput($_GET["edit"],$l,$c,$X);if($qc!="")echo$qc;elseif(preg_match('~bool~',$l["type"]))echo"<input type='hidden'$c value='0'>"."<input type='checkbox'".(preg_match('~^(1|t|true|y|yes|on)$~i',$X)?" checked='checked'":"")."$c value='1'>";elseif($l["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$l["length"],$Jc);foreach($Jc[1]as$r=>$W){$W=stripcslashes(str_replace("''","'",$W));$Fa=(is_int($X)?($X>>$r)&1:in_array($W,explode(",",$X),true));echo" <label><input type='checkbox' name='fields[$D][$r]' value='".(1<<$r)."'".($Fa?' checked':'').">".h($b->editVal($W,$l)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$l["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$D'>";elseif(($ve=preg_match('~text|lob~',$l["type"]))||preg_match("~\n~",$X)){if($ve&&$w!="sqlite")$c.=" cols='50' rows='12'";else{$N=min(12,substr_count($X,"\n")+1);$c.=" cols='30' rows='$N'".($N==1?" style='height: 1.2em;'":"");}echo"<textarea$c>".h($X).'</textarea>';}elseif($p=="json"||preg_match('~^jsonb?$~',$l["type"]))echo"<textarea$c cols='50' rows='12' class='jush-js'>".h($X).'</textarea>';else{$Oc=(!preg_match('~int~',$l["type"])&&preg_match('~^(\d+)(,(\d+))?$~',$l["length"],$A)?((preg_match("~binary~",$l["type"])?2:1)*$A[1]+($A[3]?1:0)+($A[2]&&!$l["unsigned"]?1:0)):($Me[$l["type"]]?$Me[$l["type"]]+($l["unsigned"]?0:1):0));if($w=='sql'&&min_version(5.6)&&preg_match('~time~',$l["type"]))$Oc+=7;echo"<input".((!$bc||$p==="")&&preg_match('~(?<!o)int(?!er)~',$l["type"])&&!preg_match('~\[\]~',$l["full_type"])?" type='number'":"")." value='".h($X)."'".($Oc?" data-maxlength='$Oc'":"").(preg_match('~char|binary~',$l["type"])&&$Oc>20?" size='40'":"")."$c>";}echo$b->editHint($_GET["edit"],$l,$X);$Kb=0;foreach($Vb
as$x=>$W){if($x===""||!$W)break;$Kb++;}if($Kb)echo
script("mixin(qsl('td'), {onchange: partial(skipOriginal, $Kb), oninput: function () { this.onchange(); }});");}}function
process_input($l){global$b,$i;$t=bracket_escape($l["field"]);$p=$_POST["function"][$t];$X=$_POST["fields"][$t];if($l["type"]=="enum"){if($X==-1)return
false;if($X=="")return"NULL";return+$X;}if($l["auto_increment"]&&$X=="")return
null;if($p=="orig")return(preg_match('~^CURRENT_TIMESTAMP~i',$l["on_update"])?idf_escape($l["field"]):false);if($p=="NULL")return"NULL";if($l["type"]=="set")return
array_sum((array)$X);if($p=="json"){$p="";$X=json_decode($X,true);if(!is_array($X))return
false;return$X;}if(preg_match('~blob|bytea|raw|file~',$l["type"])&&ini_bool("file_uploads")){$Hb=get_file("fields-$t");if(!is_string($Hb))return
false;return$i->quoteBinary($Hb);}return$b->processInput($l,$X,$p);}function
fields_from_edit(){global$i;$L=array();foreach((array)$_POST["field_keys"]as$x=>$W){if($W!=""){$W=bracket_escape($W);$_POST["function"][$W]=$_POST["field_funs"][$x];$_POST["fields"][$W]=$_POST["field_vals"][$x];}}foreach((array)$_POST["fields"]as$x=>$W){$D=bracket_escape($x,1);$L[$D]=array("field"=>$D,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($x==$i->primary),);}return$L;}function
search_tables(){global$b,$f;$_GET["where"][0]["val"]=$_POST["query"];$Ud="<ul>\n";foreach(table_status('',true)as$S=>$T){$D=$b->tableName($T);if(isset($T["Engine"])&&$D!=""&&(!$_POST["tables"]||in_array($S,$_POST["tables"]))){$K=$f->query("SELECT".limit("1 FROM ".table($S)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($S),array())),1));if(!$K||$K->fetch_row()){$wd="<a href='".h(ME."select=".urlencode($S)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$D</a>";echo"$Ud<li>".($K?$wd:"<p class='error'>$wd: ".error())."\n";$Ud="";}}}echo($Ud?"<p class='message'>".'No tables.':"</ul>")."\n";}function
dump_headers($jc,$Rc=false){global$b;$L=$b->dumpHeaders($jc,$Rc);$jd=$_POST["output"];if($jd!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($jc).".$L".($jd!="file"&&!preg_match('~[^0-9a-z]~',$jd)?".$jd":""));session_write_close();ob_flush();flush();return$L;}function
dump_csv($M){foreach($M
as$x=>$W){if(preg_match("~[\"\n,;\t]~",$W)||$W==="")$M[$x]='"'.str_replace('"','""',$W).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$M)."\r\n";}function
apply_sql_function($p,$d){return($p?($p=="unixepoch"?"DATETIME($d, '$p')":($p=="count distinct"?"COUNT(DISTINCT ":strtoupper("$p("))."$d)"):$d);}function
get_temp_dir(){$L=ini_get("upload_tmp_dir");if(!$L){if(function_exists('sys_get_temp_dir'))$L=sys_get_temp_dir();else{$n=@tempnam("","");if(!$n)return
false;$L=dirname($n);unlink($n);}}return$L;}function
file_open_lock($n){$o=@fopen($n,"r+");if(!$o){$o=@fopen($n,"w");if(!$o)return;chmod($n,0660);}flock($o,LOCK_EX);return$o;}function
file_write_unlock($o,$bb){rewind($o);fwrite($o,$bb);ftruncate($o,strlen($bb));flock($o,LOCK_UN);fclose($o);}function
password_file($Va){$n=get_temp_dir()."/adminer.key";$L=@file_get_contents($n);if($L||!$Va)return$L;$o=@fopen($n,"w");if($o){chmod($n,0660);$L=rand_string();fwrite($o,$L);fclose($o);}return$L;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($W,$z,$l,$we){global$b;if(is_array($W)){$L="";foreach($W
as$uc=>$V)$L.="<tr>".($W!=array_values($W)?"<th>".h($uc):"")."<td>".select_value($V,$z,$l,$we);return"<table cellspacing='0'>$L</table>";}if(!$z)$z=$b->selectLink($W,$l);if($z===null){if(is_mail($W))$z="mailto:$W";if(is_url($W))$z=$W;}$L=$b->editVal($W,$l);if($L!==null){if(!is_utf8($L))$L="\0";elseif($we!=""&&is_shortable($l))$L=shorten_utf8($L,max(0,+$we));else$L=h($L);}return$b->selectVal($L,$z,$l,$W);}function
is_mail($sb){$pa='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$lb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$I="$pa+(\\.$pa+)*@($lb?\\.)+$lb";return
is_string($sb)&&preg_match("(^$I(,\\s*$I)*\$)i",$sb);}function
is_url($R){$lb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return
preg_match("~^(https?)://($lb?\\.)+$lb(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$R);}function
is_shortable($l){return
preg_match('~char|text|json|lob|geometry|point|linestring|polygon|string|bytea~',$l["type"]);}function
count_rows($S,$Z,$v,$q){global$w;$J=" FROM ".table($S).($Z?" WHERE ".implode(" AND ",$Z):"");return($v&&($w=="sql"||count($q)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$q).")$J":"SELECT COUNT(*)".($v?" FROM (SELECT 1$J GROUP BY ".implode(", ",$q).") x":$J));}function
slow_query($J){global$b,$Ee,$i;$h=$b->database();$ze=$b->queryTimeout();$be=$i->slowQuery($J,$ze);if(!$be&&support("kill")&&is_object($g=connect())&&($h==""||$g->select_db($h))){$wc=$g->result(connection_id());echo'<script',nonce(),'>
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'kill=',$wc,'&token=',$Ee,'\');
}, ',1000*$ze,');
</script>
';}else$g=null;ob_flush();flush();$L=@get_key_vals(($be?$be:$J),$g,false);if($g){echo
script("clearTimeout(timeout);");ob_flush();flush();}return$L;}function
get_token(){$Dd=rand(1,1e6);return($Dd^$_SESSION["token"]).":$Dd";}function
verify_token(){list($Ee,$Dd)=explode(":",$_POST["token"]);return($Dd^$_SESSION["token"])==$Ee;}function
lzw_decompress($za){$jb=256;$_a=8;$Ka=array();$Kd=0;$Ld=0;for($r=0;$r<strlen($za);$r++){$Kd=($Kd<<8)+ord($za[$r]);$Ld+=8;if($Ld>=$_a){$Ld-=$_a;$Ka[]=$Kd>>$Ld;$Kd&=(1<<$Ld)-1;$jb++;if($jb>>$_a)$_a++;}}$ib=range("\0","\xFF");$L="";foreach($Ka
as$r=>$Ja){$rb=$ib[$Ja];if(!isset($rb))$rb=$gf.$gf[0];$L.=$rb;if($r)$ib[]=$gf.$rb[0];$gf=$rb;}return$L;}function
on_help($Pa,$ae=0){return
script("mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, $Pa, $ae) }, onmouseout: helpMouseout});","");}function
edit_form($a,$m,$M,$Ue){global$b,$w,$Ee,$k;$re=$b->tableName(table_status1($a,true));page_header(($Ue?'Edit':'Insert'),$k,array("select"=>array($a,$re)),$re);if($M===false)echo"<p class='error'>".'No rows.'."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$m)echo"<p class='error'>".'You have no privileges to update this table.'."\n";else{echo"<table cellspacing='0' class='layout'>".script("qsl('table').onkeydown = editingKeydown;");foreach($m
as$D=>$l){echo"<tr><th>".$b->fieldName($l);$fb=$_GET["set"][bracket_escape($D)];if($fb===null){$fb=$l["default"];if($l["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$fb,$Gd))$fb=$Gd[1];}$X=($M!==null?($M[$D]!=""&&$w=="sql"&&preg_match("~enum|set~",$l["type"])?(is_array($M[$D])?array_sum($M[$D]):+$M[$D]):$M[$D]):(!$Ue&&$l["auto_increment"]?"":(isset($_GET["select"])?false:$fb)));if(!$_POST["save"]&&is_string($X))$X=$b->editVal($X,$l);$p=($_POST["save"]?(string)$_POST["function"][$D]:($Ue&&preg_match('~^CURRENT_TIMESTAMP~i',$l["on_update"])?"now":($X===false?null:($X!==null?'':'NULL'))));if(preg_match("~time~",$l["type"])&&preg_match('~^CURRENT_TIMESTAMP~i',$X)){$X="";$p="now";}input($l,$X,$p);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]'>".script("qsl('input').oninput = fieldChange;")."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($m){echo"<input type='submit' value='".'Save'."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($Ue?'Save and continue edit':'Save and insert next')."' title='Ctrl+Shift+Enter'>\n",($Ue?script("qsl('input').onclick = function () { return !ajaxForm(this.form, '".'Saving'."…', this); };"):"");}}echo($Ue?"<input type='submit' name='delete' value='".'Delete'."'>".confirm()."\n":($_POST||!$m?"":script("focus(qsa('td', qs('#form'))[1].firstChild);")));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$Ee,'">
</form>
';}if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");header("Cache-Control: immutable");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0�\0\n @\0�C��\"\0`E�Q����?�tvM'�Jd�d\\�b0\0�\"��fӈ��s5����A�XPaJ�0���8�#R�T��z`�#.��c�X��Ȁ?�-\0�Im?�.�M��\0ȯ(̉��/(%�\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1̇�ٌ�l7��B1�4vb0��fs���n2B�ѱ٘�n:�#(�b.\rDc)��a7E����l�ñ��i1̎s���-4��f�	��i7������Fé�vt2���!�r0���t~�U�'3M��W�B�'c�P�:6T\rc�A�zr_�WK�\r-�VNFS%~�c���&�\\^�r����u�ŎÞ�ً4'7k����Q��h�'g\rFB\ryT7SS�P�1=ǤcI��:�d��m>�S8L�J��t.M���	ϋ`'C����889�� �Q����2�#8А����6m����j��h�<�����9/��:�J�)ʂ�\0d>!\0Z��v�n��o(���k�7��s��>��!�R\"*nS�\0@P\"��(�#[���@g�o���zn�9k�8�n���1�I*��=�n������0�c(�;�à��!���*c��>Ύ�E7D�LJ��1����`�8(��3M��\"�39�?E�e=Ҭ�~������Ӹ7;�C����E\rd!)�a*�5ajo\0�#`�38�\0��]�e���2�	mk��e]���AZs�StZ�Z!)BR�G+�#Jv2(���c�4<�#sB�0���6YL\r�=���[�73��<�:��bx��J=	m_ ���f�l��t��I��H�3�x*���6`t6��%�U�L�eق�<�\0�AQ<P<:�#u/�:T\\>��-�xJ�͍QH\nj�L+j�z��7���`����\nk��'�N�vX>�C-T˩�����4*L�%Cj>7ߨ�ި���`���;y���q�r�3#��} :#n�\r�^�=C�Aܸ�Ǝ�s&8��K&��*0��t�S���=�[��:�\\]�E݌�/O�>^]�ø�<����gZ�V��q����� ��x\\������޺��\"J�\\î��##���D��x6��5x�������\rH�l ����b��r�7��6���j|����ۖ*�FAquvyO��WeM����D.F��:R�\$-����T!�DS`�8D�~��A`(�em�����T@O1@��X��\nLp�P�����m�yf��)	���GSEI���xC(s(a�?\$`tE�n��,�� \$a��U>,�В\$Z�kDm,G\0��\\��i��%ʹ� n��������g���b	y`��Ԇ�W� 䗗�_C��T\ni��H%�da��i�7�At�,��J�X4n����0o͹�9g\nzm�M%`�'I���О-���7:p�3p��Q�rED������b2]�PF����>e���3j\n�߰t!�?4f�tK;��\rΞи�!�o�u�?���Ph���0uIC}'~��2�v�Q���8)���7�DI�=��y&��ea�s*hɕjlA�(�\"�\\��m^i��M)��^�	|~�l��#!Y�f81RS����!���62P�C��l&���xd!�|��9�`�_OY�=��G�[E�-eL�CvT� )�@�j-5���pSg�.�G=���ZE��\$\0�цKj�U��\$���G'I�P��~�ځ� ;��hNێG%*�Rj�X[�XPf^��|��T!�*N��І�\rU��^q1V!��Uz,�I|7�7�r,���7���ľB���;�+���ߕ�A�p����^���~ؼW!3P�I8]��v�J��f�q�|,���9W�f`\0�q�A�wE���մ�F����T�QՑG���\$0Ǔʠ#�%By7r�i{e�Q���d���Ǉ �B4;ks(�0ݎ�=�1r)_<���;̹��S��r� &Y�,h,��iiك��b�̢A�� ��G��L��z2p(�������0�����L	��S����E���	<���}_#\\f��daʄ�K�3�Y|V+�l@�0`;���Lh���ޯj'������ƙ�Y�+��QZ-i���yv��I�5ړ0O|�P�]F܏�����\0���2�D9͢���n/χQس&��I^�=�l��qfI��= �]xqGR�F�e�7�)��9*�:B�b�>a�z�-���2.����b{��4#�����Uᓍ�L7-��v/;�5��u���H��&�#���j�`�G�8� �7p���ҠYC��~��:�@��EU�J��;v7v]�J'���q1��El��Іi�����/��{k<��֡M�po�}������ٞ,�dæ�_uӗ���p�u޽�����=���tn���	����~�Lx�����{k��߇���\rj~�P+���0�u�ow�yu\$��߷�\nd��m�Zd��8i`�=��g�<���ۓ��͈*+3j����܏<[�\0���/PͭB��r���`�`�#x�+B?#�܏^;Ob\r����4��\n���0\n����0�\\�0>��P�@���2�l��j�O����(_�<�W\$�g���G�tא@�l.�h�Siƾ��PH�\n�J����LD�");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:��gCI��\n8��3)��7���81��x:\nOg#)��r7\n\"��`�|2�gSi�H)N�S��\r��\"0��@�)�`(\$s6O!��V/=��' T4�=��iS��6IO��er�x�9�*ź��n3�\rщv�C��`���2G%�Y�����1��f���Ȃl��1�\ny�*pC\r\$�n�T��3=\\�r9O\"�	��l<�\r�\\��I,�s\nA��eh+M�!�q0��f�`(�N{c��+w���Y��p٧3�3��+I��j�����k��n�q���zi#^r�����3���[��o;��(��6�#�Ґ��\":cz>ߣC2v�CX�<�P��c*5\n���/�P97�|F��c0�����!���!���!��\nZ%�ć#CH�!��r8�\$���,�Rܔ2���^0��@�2��(�88P/��݄�\\�\$La\\�;c�H��HX���\nʃt���8A<�sZ�*�;I��3��@�2<���!A8G<�j�-K�({*\r��a1���N4Tc\"\\�!=1^���M9O�:�;j��\r�X��L#H�7�#Tݪ/-���p�;�B \n�2!���t]apΎ��\0R�C�v�M�I,\r���\0Hv��?kT�4����uٱ�;&���+&���\r�X���bu4ݡi88�2B�/⃖4���N8A�A)52������2��s�8�5���p�WC@�:�t�㾴�e��h\"#8_��cp^��I]OH��:zd�3g�(���Ök��\\6����2�ږ��i��7���]\r�xO�n�p�<��p�Q�U�n��|@���#G3��8bA��6�2�67%#�\\8\r��2�c\r�ݟk��.(�	��-�J;��� ��L�� ���W��㧓ѥɤ����n��ҧ���M��9ZНs]�z����y^[��4-�U\0ta��62^��.`���.C�j�[ᄠ% Q\0`d�M8�����\$O0`4���\n\0a\rA�<�@����\r!�:�BA�9�?h>�Ǻ��~̌�6Ȉh�=�-�A7X��և\\�\r��Q<蚧q�'!XΓ2�T �!�D\r��,K�\"�%�H�qR\r�̠��C =�������<c�\n#<�5�M� �E��y�������o\"�cJKL2�&��eR��W�AΐTw�ё;�J���\\`)5��ޜB�qhT3��R	�'\r+\":�����.��ZM'|�et:3%L��#f!�h�׀e����+ļ�N�	��_�CX��G�1��i-ãz�\$�oK@O@T�=&�0�\$	�DA�����D�SJ�x9ׁFȈml��p�Gխ�T�6Rf�@�a�\rs�R�Fgih]��f�.�7+�<nhh�* �SH	P]� :Ғ��a\"�����2�&R�)�B�Pʙ�H/��f {r|�0^�hCA�0�@�M���2�B�@��z�U���O���Cpp��\\�L�%�𛄒y��odå���p3���7E����A\\���K��Xn��i.�Z�� ���s��G�m^�tI�Y�J��ٱ�G1��R��D��c���6�tMih��9��9g��q�RL��Mj-TQ�6i�G_!�.�h�v��cN�����^��0w@n|���V�ܫ�AЭ��3�[��]�	s7�G�P@ :�1т�b� ��ݟ���w�(i��:��z\\��;���A�PU T^�]9�`UX+U��Q+��b���*ϔs������[�ۉxk�F*�ݧ_w.��6~�b��mK�sI�MK�}�ҥ���eHɲ�d�*md�l�Q��eH�2�ԍL���a҂�=��s�P�aM\"ap��:<��GB�\r2Ytx&L}}��A�ԱN�GЬza��D4�t�4Q�vS�ùS\r�;U��������~�pB��{���,���O��t;�J��ZC,&Y�:Y\"�#�����t:\n�h8r����n���h>��>Z��`&�a�pY+�x�U��A�<?�PxWա�W�	i��.�\r`�\$,���Ҿ��V�]�Zr���H��5�f\\�-KƩ�v��Z��A��(�{3�o��l.��J��.�\\t2�;���2\0��>c+�|��*;-0�n��[�t@�ڕ��=cQ\n.z���wC&��@���F�����'cBS7_*rsѨ�?j�3@����!�.@7�s�]Ӫ�L�΁G��@��_�q���&u���t�\nՎ�L�E�T��}gG����w�o�(*�����A�-�����3�mk�����פ��t��S���(�d��A�~�x\n����k�ϣ:D��+�� g��h14 ��\n.��d꫖������AlY��j���jJ���PN+b� D�j������D��P���LQ`Of��@�}�(���6�^nB�4�`�e��\n��	�trp!�lV�'�}b�*�r%|\nr\r#���@w��-�T.Vv�8��\nmF�/�p��`�Y0�����P\r8�Y\r��ݤ�	�Q���%E�/@]\0��{@�Q���\0bR M\r��'|��%0SDr����f/����b:ܭ�����%߀�3H�x\0�l\0���	��W��%�\n�8\r\0}�D���1d#�x��.�jEoHrǢlb���%t�4�p���%�4���k�z2\r�`�W@�%\rJ�1��X���1�D6!��*��{4<E��k.m�4����\r\n�^i��� �!n��!2\$������(�f������k>����N��5\$���2T�,�LĂ� � Z@��*�`^P�P%5%�t�H�W��on���E#f���<�2@K:�o����Ϧ�-��2\\Wi+f�&��g&�n�L�'e�|����nK�2�rڶ�p�*.�n��������*�+�t�Bg* ��Q�1+)1h���^�`Q#�؎�n*h���v�B��\0\\F\n�W�r f\$�=4\$G4ed�b�:J^!�0��_���%2��6�.F���Һ�EQ�����dts\"�����B(�`�\r���c�R����V����X��:R�*2E*s�\$��+�:bXl��tb��-�S>��-�d�=��\$S�\$�2�ʁ7�j�\"[́\"��]�[6��SE_>�q.\$@z`�;�4�3ʼ�CS�*�[���{DO�ުCJj峚P�:'���ȕ QEӖ�`%r��7��G+hW4E*��#TuFj�\n�e�D�^�s��r.��Rk��z@��@���D�`C�V!C���\0��ۊ)3<��Q4@�3SP��ZB�5F�L�~G�5���:���5\$X���}ƞf���I���3S8�\0XԂtd�<\nbtN� Q�;\r��H��P�\0��&\n���\$V�\r:�\0]V5gV���D`�N1:�SS4Q�4�N��5u�5�`x	�<5_FH���}7��)�SV��Ğ#�|��< ռ�˰���\\��-�z2�\0�#�WJU6kv���#��\r�췐����U��i��_��^�UVJ|Y.��ɛ\0u,�������_UQD#�ZJu�Xt��_�&JO,Du`N\r5��`�}ZQM^m�P�G[��a�b�N䞮��re�\n��%�4��o_(�^�q@Y6t;I\nGSM�3��^SAYH�hB��5�fN?NjWU�J����֯Yֳke\"\\B1�؅0� �en���*<�O`S�L�\n��.g�5Zj�\0R\$�h��n�[�\\���r���,�4����cP�p�q@R�rw>�wCK��t��}5_uvh��`/����\$�J)�R�2Du73�d\r�;��w���H�I_\"4�r�����Ͽ+�&0>�_-eqeD��V��n��f�h��\"Z����Z�W�6\\L���ke&�~������i\$ϰ�Mr�i*�����\0�.Q,��8\r���\$׭K��Y� �io�e%t�2�\0�J��~��/I/.�e��n�~x!�8��|f�h�ۄ-H���&�/��o�����.K� �^j��t��>('L\r��HsK1�e�\0��\$&3�\0�in3� o�6�ж�����9�j������1�(b.�vC�ݎ8���:wi��\"�^w�Q����z�o~�/��Ғ���`Y2��D�V����/k�8��7Z�H����]2k2r���ϯh�=�T��]O&�\0�M\0�[8��Ȯ���8&L�Vm�v���j�ך�F��\\��	���&s��Q� \\\"�b��	��\rBs�Iw�	�Y��N �7�C/*����\n\n�H�[����*A���TE�VP.UZ(tz/}\n2��y�S���,#�3�i�~W@yCC\nKT��1\"@|�zC\$��_CZjzHB�LV�,K����O���P�@X���������;D�WZ�W�a���\0ފ�CG8�R �	�\n������P�A��&������,�pfV|@N�b�\$�[�I����������Z�@Zd\\\"�|��+�ۮ��tz�o\$�\0[����y�E���ə�bhU1��,�r\$�o8D���F��V&ځ5�h}��N�ͳ&�絕ef�ǙY��:�^z�VPu	W�Z\"r�:�h�w��h#1��O���K�hq`妄����v|�˧:wD�j�(W�������碌�?�;|Z��%�%ڡ�r@[����B�&������#���ُ��:)��Y6����&��	@�	���I��!����� ���2M���O;���W��)��C��FZ�p!��a��*F�b�I��;���#Ĥ9����S�/S�A�`z�L*�8�+��N���-�M���-kd���Li�J�·�Jn��b��>,�V�SP�8��>�w��\"E.��Rz`��u_����E\\��ɫ�3P��ӥs]���goVS���\n��	*�\r��7)�ʄ�m�PW�UՀ��ǰ���f��ܓi�ƅkЌ\r�('W`�Bd�/h*�A�l�M��_\n�������O��T�5�&A�2é`��\\R�E\"_�_��.7�M�6d;�<?��)(;���}K�[�����Z?��yI ��1p�bu\0�������{��\ri�s�QQ�Y�2��\rה0\0X�\"@q��uMb��uJ�6�NG���^��wF/t���#P�p��!7������囜!û�^V��M�!(⩀8֝�=�\0�@���80N�Sཾ�Q�_T��ĥ�qSz\"�&h�\0R.\0hZ�fx���F9�Q(�b�=�D&xs=X�bu�@o�w�d�5���P�1P>k��H�D6/ڿ�q랼��3�7TЬK�~54�	�t#�M�\rc�tx�g��T��X\r�2\$�<0�y}*��Cbi�^��L�7	�b�o����x71� b�XS`O���0)���\"�/��=Ȭ �l��Q�p�-�!��{��������a��ȕ9bAg�2,1�zf�k��j�h/o(�.4�\r���Tz&nw���7 X!����@,�<�	��`\"@:��7�CX\\	 \$1H\n=ě�O5��&�v�*(	�tH��#�\n�_X/8�k~+t���O&<v��_Yh��.��Me�Hxp�I�a��0�M\nh�`r'B���h�n8q��!	�֠eu��]^TW����d9{��H,㗂8��L�a�,!\0;��B#�#��`�)�����	ńa�Ee�ڑ�/M�P�	�l���a`	�sⲅ<(D\n���9{06�ƈ;A8��5!	���Z[T� hV���ܻ��U@�n`�V�p��h(Rb4�V�Ɖ����Rp��Ҕ\$����D3O����\$�����aQ��0xb�H`����LÔ8i��oC�����#6�x�)XH�!`�������B�%w���o\nx̀h��H���r� ʼc��mJH�LU����e1l`�(�\$\"�h�J�rv���TP�����1uHA\0��H2@(ʡU�\"�Q�@qg]l\"�%���*�\0W�j[� ���e�4���P��N����5\$H\r��IP��'@:\0�\"#t^�D��0���>�(��h� '��F,sZJ��An�#�h��X��.q��Yob�����2��?j��B�I��ߣ��������0�a�(�`Z�C����r��HSQ��\\��W	��XZ��|�E@���TԝŖq�DD:_y��İ��B�~�xP�--e��_�u�|2(�G,��-rR�Kx���d���hH�A|���w�|P�!ǉґ䎬}�T���<��,1��v�g*���z�^������_pi {��G����	LaJJC�T%N1��I:V@Z��%ɂ*�|@NNxL��L�zd \$8b#�!2=cۍ�QD��@�\0�J�dzp��\$A�|ya4)��s%!�BI�Q]d�G�6&E\$��H\$Rj\0���ܗGi\$إ�9ņY��@ʴ0�6Ħ��X�ܞ1&L��&2�	E^��a8�j�#�DEu�\$uT�*R�#&��P2�e��K��'�E%┡�YW�J��	����O`�ʕ��^l+��`�	R�1u�&F���Z[)]J�Z�E��`��FN.\r�=�� ��\0�O~���M,��FAT�b�h�z0��`-bl�\n�ǅZ�'�*I�n�\$�[�,8D��n��`����I0u�0��EJ鸆Xc�e�2P�� b��]���5:겓�'xT	�'bO�Y��V>&��A�.Pp�ŭ\${)9\"i�c���Ǚ�L� P�K�T��9���0wZ\"b	�)���R��&�ɢ���&�X+���s%[�~&aF��i.:�K�a5@���q���pG��hĺn�0y�H,W>�J�!���&�2Y���lAp����-3�]���2C�MZ����H�o�d�1Dl�uS\"��M�Tz\$�h\\c����w<�cO3?z���p%@\0�4\n�Z�ӗ���f*\r���|�ل;3�M�Rm�� �w�X���.Y�L���]Wg]��\r胜1@U8��e3U����D�	z�'���&��#hu�a1C�0�{ph͔\n?��YK�B���Y��A9�,�F��w�");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress('');}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo'';break;case"cross.gif":echo'';break;case"up.gif":echo'';break;case"down.gif":echo'';break;case"arrow.gif":echo'';break;}}exit;}if($_GET["script"]=="version"){$o=file_open_lock(get_temp_dir()."/adminer.version");if($o)file_write_unlock($o,serialize(array("signature"=>$_POST["signature"],"version"=>$_POST["version"])));exit;}global$b,$f,$i,$mb,$pb,$xb,$k,$Vb,$Yb,$aa,$pc,$w,$ba,$zc,$ad,$pd,$ke,$cc,$Ee,$Ie,$Me,$Te,$ca;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";if($_SERVER["HTTP_X_FORWARDED_PREFIX"])$_SERVER["REQUEST_URI"]=$_SERVER["HTTP_X_FORWARDED_PREFIX"].$_SERVER["REQUEST_URI"];$aa=($_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off"))||ini_bool("session.cookie_secure");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_cache_limiter("");session_name("adminer_sid");$nd=array(0,preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]),"",$aa);if(version_compare(PHP_VERSION,'5.2.0')>=0)$nd[]=true;call_user_func_array('session_set_cookie_params',$nd);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$Jb);if(get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",15);function
get_lang(){return'en';}function
lang($He,$Xc=null){if(is_array($He)){$sd=($Xc==1?0:1);$He=$He[$sd];}$He=str_replace("%d","%s",$He);$Xc=format_number($Xc);return
sprintf($He,$Xc);}if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$errno,$error;function
__construct(){global$b;$sd=array_search("SQL",$b->operators);if($sd!==false)unset($b->operators[$sd]);}function
dsn($nb,$U,$H,$E=array()){try{parent::__construct($nb,$U,$H,$E);}catch(Exception$_b){auth_error(h($_b->getMessage()));}$this->setAttribute(13,array('Min_PDOStatement'));$this->server_info=@$this->getAttribute(4);}function
query($J,$Ne=false){$K=parent::query($J);$this->error="";if(!$K){list(,$this->errno,$this->error)=$this->errorInfo();if(!$this->error)$this->error='Unknown error.';return
false;}$this->store_result($K);return$K;}function
multi_query($J){return$this->_result=$this->query($J);}function
store_result($K=null){if(!$K){$K=$this->_result;if(!$K)return
false;}if($K->columnCount()){$K->num_rows=$K->rowCount();return$K;}$this->affected_rows=$K->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($J,$l=0){$K=$this->query($J);if(!$K)return
false;$M=$K->fetch();return$M[$l];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$M=(object)$this->getColumnMeta($this->_offset++);$M->orgtable=$M->table;$M->orgname=$M->name;$M->charsetnr=(in_array("blob",(array)$M->flags)?63:0);return$M;}}}$mb=array();class
Min_SQL{var$_conn;function
__construct($f){$this->_conn=$f;}function
select($S,$O,$Z,$q,$F=array(),$y=1,$G=0,$wd=false){global$b,$w;$v=(count($q)<count($O));$J=$b->selectQueryBuild($O,$Z,$q,$F,$y,$G);if(!$J)$J="SELECT".limit(($_GET["page"]!="last"&&$y!=""&&$q&&$v&&$w=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$O)."\nFROM ".table($S),($Z?"\nWHERE ".implode(" AND ",$Z):"").($q&&$v?"\nGROUP BY ".implode(", ",$q):"").($F?"\nORDER BY ".implode(", ",$F):""),($y!=""?+$y:null),($G?$y*$G:0),"\n");$he=microtime(true);$L=$this->_conn->query($J);if($wd)echo$b->selectQuery($J,$he,!$L);return$L;}function
delete($S,$Bd,$y=0){$J="FROM ".table($S);return
queries("DELETE".($y?limit1($S,$J,$Bd):" $J$Bd"));}function
update($S,$Q,$Bd,$y=0,$Vd="\n"){$Ye=array();foreach($Q
as$x=>$W)$Ye[]="$x = $W";$J=table($S)." SET$Vd".implode(",$Vd",$Ye);return
queries("UPDATE".($y?limit1($S,$J,$Bd,$Vd):" $J$Bd"));}function
insert($S,$Q){return
queries("INSERT INTO ".table($S).($Q?" (".implode(", ",array_keys($Q)).")\nVALUES (".implode(", ",$Q).")":" DEFAULT VALUES"));}function
insertUpdate($S,$N,$vd){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}function
slowQuery($J,$ze){}function
convertSearch($t,$W,$l){return$t;}function
value($W,$l){return(method_exists($this->_conn,'value')?$this->_conn->value($W,$l):(is_resource($W)?stream_get_contents($W):$W));}function
quoteBinary($Nd){return
q($Nd);}function
warnings(){return'';}function
tableHelp($D){}}$mb=array("server"=>"MySQL")+$mb;if(!defined("DRIVER")){$td=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
__construct(){parent::init();}function
connect($P="",$U="",$H="",$cb=null,$rd=null,$ce=null){global$b;mysqli_report(MYSQLI_REPORT_OFF);list($hc,$rd)=explode(":",$P,2);$ge=$b->connectSsl();if($ge)$this->ssl_set($ge['key'],$ge['cert'],$ge['ca'],'','');$L=@$this->real_connect(($P!=""?$hc:ini_get("mysqli.default_host")),($P.$U!=""?$U:ini_get("mysqli.default_user")),($P.$U.$H!=""?$H:ini_get("mysqli.default_pw")),$cb,(is_numeric($rd)?$rd:ini_get("mysqli.default_port")),(!is_numeric($rd)?$rd:$ce),($ge?64:0));$this->options(MYSQLI_OPT_LOCAL_INFILE,false);return$L;}function
set_charset($Da){if(parent::set_charset($Da))return
true;parent::set_charset('utf8');return$this->query("SET NAMES $Da");}function
result($J,$l=0){$K=$this->query($J);if(!$K)return
false;$M=$K->fetch_array();return$M[$l];}function
quote($R){return"'".$this->escape_string($R)."'";}}}elseif(extension_loaded("mysql")&&!((ini_bool("sql.safe_mode")||ini_bool("mysql.allow_local_infile"))&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($P,$U,$H){if(ini_bool("mysql.allow_local_infile")){$this->error=sprintf('Disable %s or enable %s or %s extensions.',"'mysql.allow_local_infile'","MySQLi","PDO_MySQL");return
false;}$this->_link=@mysql_connect(($P!=""?$P:ini_get("mysql.default_host")),("$P$U"!=""?$U:ini_get("mysql.default_user")),("$P$U$H"!=""?$H:ini_get("mysql.default_password")),true,131072);if($this->_link)$this->server_info=mysql_get_server_info($this->_link);else$this->error=mysql_error();return(bool)$this->_link;}function
set_charset($Da){if(function_exists('mysql_set_charset')){if(mysql_set_charset($Da,$this->_link))return
true;mysql_set_charset('utf8',$this->_link);}return$this->query("SET NAMES $Da");}function
quote($R){return"'".mysql_real_escape_string($R,$this->_link)."'";}function
select_db($cb){return
mysql_select_db($cb,$this->_link);}function
query($J,$Ne=false){$K=@($Ne?mysql_unbuffered_query($J,$this->_link):mysql_query($J,$this->_link));$this->error="";if(!$K){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($K===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($K);}function
multi_query($J){return$this->_result=$this->query($J);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($J,$l=0){$K=$this->query($J);if(!$K||!$K->num_rows)return
false;return
mysql_result($K->_result,0,$l);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($K){$this->_result=$K;$this->num_rows=mysql_num_rows($K);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$L=mysql_fetch_field($this->_result,$this->_offset++);$L->orgtable=$L->table;$L->orgname=$L->name;$L->charsetnr=($L->blob?63:0);return$L;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($P,$U,$H){global$b;$E=array(PDO::MYSQL_ATTR_LOCAL_INFILE=>false);$ge=$b->connectSsl();if($ge)$E+=array(PDO::MYSQL_ATTR_SSL_KEY=>$ge['key'],PDO::MYSQL_ATTR_SSL_CERT=>$ge['cert'],PDO::MYSQL_ATTR_SSL_CA=>$ge['ca'],);$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$P)),$U,$H,$E);return
true;}function
set_charset($Da){$this->query("SET NAMES $Da");}function
select_db($cb){return$this->query("USE ".idf_escape($cb));}function
query($J,$Ne=false){$this->setAttribute(1000,!$Ne);return
parent::query($J,$Ne);}}}class
Min_Driver
extends
Min_SQL{function
insert($S,$Q){return($Q?parent::insert($S,$Q):queries("INSERT INTO ".table($S)." ()\nVALUES ()"));}function
insertUpdate($S,$N,$vd){$e=array_keys(reset($N));$ud="INSERT INTO ".table($S)." (".implode(", ",$e).") VALUES\n";$Ye=array();foreach($e
as$x)$Ye[$x]="$x = VALUES($x)";$ne="\nON DUPLICATE KEY UPDATE ".implode(", ",$Ye);$Ye=array();$Cc=0;foreach($N
as$Q){$X="(".implode(", ",$Q).")";if($Ye&&(strlen($ud)+$Cc+strlen($X)+strlen($ne)>1e6)){if(!queries($ud.implode(",\n",$Ye).$ne))return
false;$Ye=array();$Cc=0;}$Ye[]=$X;$Cc+=strlen($X)+2;}return
queries($ud.implode(",\n",$Ye).$ne);}function
slowQuery($J,$ze){if(min_version('5.7.8','10.1.2')){if(preg_match('~MariaDB~',$this->_conn->server_info))return"SET STATEMENT max_statement_time=$ze FOR $J";elseif(preg_match('~^(SELECT\b)(.+)~is',$J,$A))return"$A[1] /*+ MAX_EXECUTION_TIME(".($ze*1000).") */ $A[2]";}}function
convertSearch($t,$W,$l){return(preg_match('~char|text|enum|set~',$l["type"])&&!preg_match("~^utf8~",$l["collation"])&&preg_match('~[\x80-\xFF]~',$W['val'])?"CONVERT($t USING ".charset($this->_conn).")":$t);}function
warnings(){$K=$this->_conn->query("SHOW WARNINGS");if($K&&$K->num_rows){ob_start();select($K);return
ob_get_clean();}}function
tableHelp($D){$Hc=preg_match('~MariaDB~',$this->_conn->server_info);if(information_schema(DB))return
strtolower(($Hc?"information-schema-$D-table/":str_replace("_","-",$D)."-table.html"));if(DB=="mysql")return($Hc?"mysql$D-table/":"system-database.html");}}function
idf_escape($t){return"`".str_replace("`","``",$t)."`";}function
table($t){return
idf_escape($t);}function
connect(){global$b,$Me,$ke;$f=new
Min_DB;$Xa=$b->credentials();if($f->connect($Xa[0],$Xa[1],$Xa[2])){$f->set_charset(charset($f));$f->query("SET sql_quote_show_create = 1, autocommit = 1");if(min_version('5.7.8',10.2,$f)){$ke['Strings'][]="json";$Me["json"]=4294967295;}return$f;}$L=$f->error;if(function_exists('iconv')&&!is_utf8($L)&&strlen($Nd=iconv("windows-1250","utf-8",$L))>strlen($L))$L=$Nd;return$L;}function
get_databases($Lb){$L=get_session("dbs");if($L===null){$J=(min_version(5)?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA ORDER BY SCHEMA_NAME":"SHOW DATABASES");$L=($Lb?slow_query($J):get_vals($J));restart_session();set_session("dbs",$L);stop_session();}return$L;}function
limit($J,$Z,$y,$Yc=0,$Vd=" "){return" $J$Z".($y!==null?$Vd."LIMIT $y".($Yc?" OFFSET $Yc":""):"");}function
limit1($S,$J,$Z,$Vd="\n"){return
limit($J,$Z,1,0,$Vd);}function
db_collation($h,$Na){global$f;$L=null;$Va=$f->result("SHOW CREATE DATABASE ".idf_escape($h),1);if(preg_match('~ COLLATE ([^ ]+)~',$Va,$A))$L=$A[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$Va,$A))$L=$Na[$A[1]][-1];return$L;}function
engines(){$L=array();foreach(get_rows("SHOW ENGINES")as$M){if(preg_match("~YES|DEFAULT~",$M["Support"]))$L[]=$M["Engine"];}return$L;}function
logged_user(){global$f;return$f->result("SELECT USER()");}function
tables_list(){return
get_key_vals(min_version(5)?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($db){$L=array();foreach($db
as$h)$L[$h]=count(get_vals("SHOW TABLES IN ".idf_escape($h)));return$L;}function
table_status($D="",$Fb=false){$L=array();foreach(get_rows($Fb&&min_version(5)?"SELECT TABLE_NAME AS Name, ENGINE AS Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($D!=""?"AND TABLE_NAME = ".q($D):"ORDER BY Name"):"SHOW TABLE STATUS".($D!=""?" LIKE ".q(addcslashes($D,"%_\\")):""))as$M){if($M["Engine"]=="InnoDB")$M["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\1',$M["Comment"]);if(!isset($M["Engine"]))$M["Comment"]="";if($D!="")return$M;$L[$M["Name"]]=$M;}return$L;}function
is_view($T){return$T["Engine"]===null;}function
fk_support($T){return
preg_match('~InnoDB|IBMDB2I~i',$T["Engine"])||(preg_match('~NDB~i',$T["Engine"])&&min_version(5.6));}function
fields($S){$L=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($S))as$M){preg_match('~^([^( ]+)(?:\((.+)\))?( unsigned)?( zerofill)?$~',$M["Type"],$A);$L[$M["Field"]]=array("field"=>$M["Field"],"full_type"=>$M["Type"],"type"=>$A[1],"length"=>$A[2],"unsigned"=>ltrim($A[3].$A[4]),"default"=>($M["Default"]!=""||preg_match("~char|set~",$A[1])?$M["Default"]:null),"null"=>($M["Null"]=="YES"),"auto_increment"=>($M["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$M["Extra"],$A)?$A[1]:""),"collation"=>$M["Collation"],"privileges"=>array_flip(preg_split('~, *~',$M["Privileges"])),"comment"=>$M["Comment"],"primary"=>($M["Key"]=="PRI"),);}return$L;}function
indexes($S,$g=null){$L=array();foreach(get_rows("SHOW INDEX FROM ".table($S),$g)as$M){$D=$M["Key_name"];$L[$D]["type"]=($D=="PRIMARY"?"PRIMARY":($M["Index_type"]=="FULLTEXT"?"FULLTEXT":($M["Non_unique"]?($M["Index_type"]=="SPATIAL"?"SPATIAL":"INDEX"):"UNIQUE")));$L[$D]["columns"][]=$M["Column_name"];$L[$D]["lengths"][]=($M["Index_type"]=="SPATIAL"?null:$M["Sub_part"]);$L[$D]["descs"][]=null;}return$L;}function
foreign_keys($S){global$f,$ad;static$I='(?:`(?:[^`]|``)+`)|(?:"(?:[^"]|"")+")';$L=array();$Wa=$f->result("SHOW CREATE TABLE ".table($S),1);if($Wa){preg_match_all("~CONSTRAINT ($I) FOREIGN KEY ?\\(((?:$I,? ?)+)\\) REFERENCES ($I)(?:\\.($I))? \\(((?:$I,? ?)+)\\)(?: ON DELETE ($ad))?(?: ON UPDATE ($ad))?~",$Wa,$Jc,PREG_SET_ORDER);foreach($Jc
as$A){preg_match_all("~$I~",$A[2],$de);preg_match_all("~$I~",$A[5],$ue);$L[idf_unescape($A[1])]=array("db"=>idf_unescape($A[4]!=""?$A[3]:$A[4]),"table"=>idf_unescape($A[4]!=""?$A[4]:$A[3]),"source"=>array_map('idf_unescape',$de[0]),"target"=>array_map('idf_unescape',$ue[0]),"on_delete"=>($A[6]?$A[6]:"RESTRICT"),"on_update"=>($A[7]?$A[7]:"RESTRICT"),);}}return$L;}function
view($D){global$f;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\s+AS\s+~isU','',$f->result("SHOW CREATE VIEW ".table($D),1)));}function
collations(){$L=array();foreach(get_rows("SHOW COLLATION")as$M){if($M["Default"])$L[$M["Charset"]][-1]=$M["Collation"];else$L[$M["Charset"]][]=$M["Collation"];}ksort($L);foreach($L
as$x=>$W)asort($L[$x]);return$L;}function
information_schema($h){return(min_version(5)&&$h=="information_schema")||(min_version(5.5)&&$h=="performance_schema");}function
error(){global$f;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$f->error));}function
create_database($h,$Ma){return
queries("CREATE DATABASE ".idf_escape($h).($Ma?" COLLATE ".q($Ma):""));}function
drop_databases($db){$L=apply_queries("DROP DATABASE",$db,'idf_escape');restart_session();set_session("dbs",null);return$L;}function
rename_database($D,$Ma){$L=false;if(create_database($D,$Ma)){$Hd=array();foreach(tables_list()as$S=>$Ke)$Hd[]=table($S)." TO ".idf_escape($D).".".table($S);$L=(!$Hd||queries("RENAME TABLE ".implode(", ",$Hd)));if($L)queries("DROP DATABASE ".idf_escape(DB));restart_session();set_session("dbs",null);}return$L;}function
auto_increment(){$ta=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$mc){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$mc["columns"],true)){$ta="";break;}if($mc["type"]=="PRIMARY")$ta=" UNIQUE";}}return" AUTO_INCREMENT$ta";}function
alter_table($S,$D,$m,$Nb,$Qa,$wb,$Ma,$sa,$od){$ma=array();foreach($m
as$l)$ma[]=($l[1]?($S!=""?($l[0]!=""?"CHANGE ".idf_escape($l[0]):"ADD"):" ")." ".implode($l[1]).($S!=""?$l[2]:""):"DROP ".idf_escape($l[0]));$ma=array_merge($ma,$Nb);$ie=($Qa!==null?" COMMENT=".q($Qa):"").($wb?" ENGINE=".q($wb):"").($Ma?" COLLATE ".q($Ma):"").($sa!=""?" AUTO_INCREMENT=$sa":"");if($S=="")return
queries("CREATE TABLE ".table($D)." (\n".implode(",\n",$ma)."\n)$ie$od");if($S!=$D)$ma[]="RENAME TO ".table($D);if($ie)$ma[]=ltrim($ie);return($ma||$od?queries("ALTER TABLE ".table($S)."\n".implode(",\n",$ma).$od):true);}function
alter_indexes($S,$ma){foreach($ma
as$x=>$W)$ma[$x]=($W[2]=="DROP"?"\nDROP INDEX ".idf_escape($W[1]):"\nADD $W[0] ".($W[0]=="PRIMARY"?"KEY ":"").($W[1]!=""?idf_escape($W[1])." ":"")."(".implode(", ",$W[2]).")");return
queries("ALTER TABLE ".table($S).implode(",",$ma));}function
truncate_tables($se){return
apply_queries("TRUNCATE TABLE",$se);}function
drop_views($bf){return
queries("DROP VIEW ".implode(", ",array_map('table',$bf)));}function
drop_tables($se){return
queries("DROP TABLE ".implode(", ",array_map('table',$se)));}function
move_tables($se,$bf,$ue){$Hd=array();foreach(array_merge($se,$bf)as$S)$Hd[]=table($S)." TO ".idf_escape($ue).".".table($S);return
queries("RENAME TABLE ".implode(", ",$Hd));}function
copy_tables($se,$bf,$ue){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($se
as$S){$D=($ue==DB?table("copy_$S"):idf_escape($ue).".".table($S));if(!queries("CREATE TABLE $D LIKE ".table($S))||!queries("INSERT INTO $D SELECT * FROM ".table($S)))return
false;foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($S,"%_\\")))as$M){$Je=$M["Trigger"];if(!queries("CREATE TRIGGER ".($ue==DB?idf_escape("copy_$Je"):idf_escape($ue).".".idf_escape($Je))." $M[Timing] $M[Event] ON $D FOR EACH ROW\n$M[Statement];"))return
false;}}foreach($bf
as$S){$D=($ue==DB?table("copy_$S"):idf_escape($ue).".".table($S));$af=view($S);if(!queries("CREATE VIEW $D AS $af[select]"))return
false;}return
true;}function
trigger($D){if($D=="")return
array();$N=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($D));return
reset($N);}function
triggers($S){$L=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($S,"%_\\")))as$M)$L[$M["Trigger"]]=array($M["Timing"],$M["Event"]);return$L;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($D,$Ke){global$f,$xb,$pc,$Me;$la=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$ee="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$Le="((".implode("|",array_merge(array_keys($Me),$la)).")\\b(?:\\s*\\(((?:[^'\")]|$xb)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$I="$ee*(".($Ke=="FUNCTION"?"":$pc).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$Le";$Va=$f->result("SHOW CREATE $Ke ".idf_escape($D),2);preg_match("~\\(((?:$I\\s*,?)*)\\)\\s*".($Ke=="FUNCTION"?"RETURNS\\s+$Le\\s+":"")."(.*)~is",$Va,$A);$m=array();preg_match_all("~$I\\s*,?~is",$A[1],$Jc,PREG_SET_ORDER);foreach($Jc
as$md){$D=str_replace("``","`",$md[2]).$md[3];$m[]=array("field"=>$D,"type"=>strtolower($md[5]),"length"=>preg_replace_callback("~$xb~s",'normalize_enum',$md[6]),"unsigned"=>strtolower(preg_replace('~\s+~',' ',trim("$md[8] $md[7]"))),"null"=>1,"full_type"=>$md[4],"inout"=>strtoupper($md[1]),"collation"=>strtolower($md[9]),);}if($Ke!="FUNCTION")return
array("fields"=>$m,"definition"=>$A[11]);return
array("fields"=>$m,"returns"=>array("type"=>$A[12],"length"=>$A[13],"unsigned"=>$A[15],"collation"=>$A[16]),"definition"=>$A[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME AS SPECIFIC_NAME, ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
routine_id($D,$M){return
idf_escape($D);}function
last_id(){global$f;return$f->result("SELECT LAST_INSERT_ID()");}function
explain($f,$J){return$f->query("EXPLAIN ".(min_version(5.1)?"PARTITIONS ":"").$J);}function
found_rows($T,$Z){return($Z||$T["Engine"]!="InnoDB"?null:$T["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Od){return
true;}function
create_sql($S,$sa,$le){global$f;$L=$f->result("SHOW CREATE TABLE ".table($S),1);if(!$sa)$L=preg_replace('~ AUTO_INCREMENT=\d+~','',$L);return$L;}function
truncate_sql($S){return"TRUNCATE ".table($S);}function
use_sql($cb){return"USE ".idf_escape($cb);}function
trigger_sql($S){$L="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($S,"%_\\")),null,"-- ")as$M)$L.="\nCREATE TRIGGER ".idf_escape($M["Trigger"])." $M[Timing] $M[Event] ON ".table($M["Table"])." FOR EACH ROW\n$M[Statement];;\n";return$L;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($l){if(preg_match("~binary~",$l["type"]))return"HEX(".idf_escape($l["field"]).")";if($l["type"]=="bit")return"BIN(".idf_escape($l["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$l["type"]))return(min_version(8)?"ST_":"")."AsWKT(".idf_escape($l["field"]).")";}function
unconvert_field($l,$L){if(preg_match("~binary~",$l["type"]))$L="UNHEX($L)";if($l["type"]=="bit")$L="CONV($L, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$l["type"]))$L=(min_version(8)?"ST_":"")."GeomFromText($L)";return$L;}function
support($Gb){return!preg_match("~scheme|sequence|type|view_trigger|materializedview".(min_version(8)?"":"|descidx".(min_version(5.1)?"":"|event|partitioning".(min_version(5)?"":"|routine|trigger|view")))."~",$Gb);}function
kill_process($W){return
queries("KILL ".number($W));}function
connection_id(){return"SELECT CONNECTION_ID()";}function
max_connections(){global$f;return$f->result("SELECT @@max_connections");}$w="sql";$Me=array();$ke=array();foreach(array('Numbers'=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),'Date and time'=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),'Strings'=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),'Lists'=>array("enum"=>65535,"set"=>64),'Binary'=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),'Geometry'=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$x=>$W){$Me+=$W;$ke[$x]=array_keys($W);}$Te=array("unsigned","zerofill","unsigned zerofill");$fd=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","FIND_IN_SET","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$Vb=array("char_length","date","from_unixtime","lower","round","floor","ceil","sec_to_time","time_to_sec","upper");$Yb=array("avg","count","count distinct","group_concat","max","min","sum");$pb=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array(number_type()=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~^[^?]*/([^?]*).*~','\1',$_SERVER["REQUEST_URI"]).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ca="4.7.1";class
Adminer{var$operators=array("<=",">=");var$_values=array();function
name(){return"<a href='/'".target_blank()." id='h1'>".'AimTechs'."</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
connectSsl(){}function
permanentLogin($Va=false){return
password_file($Va);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
serverName($P){}function
database(){global$f;if($f){$db=$this->databases(false);return(!$db?$f->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1)"):$db[(information_schema($db[0])?1:0)]);}}function
schemas(){return
schemas();}function
databases($Lb=true){return
get_databases($Lb);}function
queryTimeout(){return
5;}function
headers(){}function
csp(){return
csp();}function
head(){return
true;}function
css(){$L=array();$n="adminer.css";if(file_exists($n))$L[]=$n;return$L;}function
loginForm(){echo"<table cellspacing='0' class='layout'>\n",$this->loginFormField('username','<tr><th>'.'Username'.'<td>','<input type="hidden" name="auth[driver]" value="server"><input name="auth[username]" id="username" value="'.h($_GET["username"]).'" autocomplete="username" autocapitalize="off">'.script("focus(qs('#username'));")),$this->loginFormField('password','<tr><th>'.'Password'.'<td>','<input type="password" name="auth[password]" autocomplete="current-password">'."\n"),"</table>\n","<p><input type='submit' value='".'Login'."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],'Permanent login')."\n";}function
loginFormField($D,$fc,$X){return$fc.$X;}function
login($Fc,$H){return
true;}function
tableName($qe){return
h($qe["Comment"]!=""?$qe["Comment"]:$qe["Name"]);}function
fieldName($l,$F=0){return
h(preg_replace('~\s+\[.*\]$~','',($l["comment"]!=""?$l["comment"]:$l["field"])));}function
selectLinks($qe,$Q=""){$a=$qe["Name"];if($Q!==null)echo'<p class="tabs"><a href="'.h(ME.'edit='.urlencode($a).$Q).'">'.'New item'."</a>\n";}function
foreignKeys($S){return
foreign_keys($S);}function
backwardKeys($S,$pe){$L=array();foreach(get_rows("SELECT TABLE_NAME, CONSTRAINT_NAME, COLUMN_NAME, REFERENCED_COLUMN_NAME
FROM information_schema.KEY_COLUMN_USAGE
WHERE TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_NAME = ".q($S)."
ORDER BY ORDINAL_POSITION",null,"")as$M)$L[$M["TABLE_NAME"]]["keys"][$M["CONSTRAINT_NAME"]][$M["COLUMN_NAME"]]=$M["REFERENCED_COLUMN_NAME"];foreach($L
as$x=>$W){$D=$this->tableName(table_status($x,true));if($D!=""){$Pd=preg_quote($pe);$Vd="(:|\\s*-)?\\s+";$L[$x]["name"]=(preg_match("(^$Pd$Vd(.+)|^(.+?)$Vd$Pd\$)iu",$D,$A)?$A[2].$A[3]:$D);}else
unset($L[$x]);}return$L;}function
backwardKeysPrint($wa,$M){foreach($wa
as$S=>$va){foreach($va["keys"]as$Oa){$z=ME.'select='.urlencode($S);$r=0;foreach($Oa
as$d=>$W)$z.=where_link($r++,$d,$M[$W]);echo"<a href='".h($z)."'>".h($va["name"])."</a>";$z=ME.'edit='.urlencode($S);foreach($Oa
as$d=>$W)$z.="&set".urlencode("[".bracket_escape($d)."]")."=".urlencode($M[$W]);echo"<a href='".h($z)."' title='".'New item'."'>+</a> ";}}}function
selectQuery($J,$he,$Eb=false){return"<!--\n".str_replace("--","--><!-- ",$J)."\n(".format_time($he).")\n-->\n";}function
rowDescription($S){foreach(fields($S)as$l){if(preg_match("~varchar|character varying~",$l["type"]))return
idf_escape($l["field"]);}return"";}function
rowDescriptions($N,$Pb){$L=$N;foreach($N[0]as$x=>$W){if(list($S,$s,$D)=$this->_foreignColumn($Pb,$x)){$kc=array();foreach($N
as$M)$kc[$M[$x]]=q($M[$x]);$hb=$this->_values[$S];if(!$hb)$hb=get_key_vals("SELECT $s, $D FROM ".table($S)." WHERE $s IN (".implode(", ",$kc).")");foreach($N
as$C=>$M){if(isset($M[$x]))$L[$C][$x]=(string)$hb[$M[$x]];}}}return$L;}function
selectLink($W,$l){}function
selectVal($W,$z,$l,$id){$L=$W;$z=h($z);if(preg_match('~blob|bytea~',$l["type"])&&!is_utf8($W)){$L=lang(array('%d byte','%d bytes'),strlen($id));if(preg_match("~^(GIF|\xFF\xD8\xFF|\x89PNG\x0D\x0A\x1A\x0A)~",$id))$L="<img src='$z' alt='$L'>";}if(like_bool($l)&&$L!="")$L=(preg_match('~^(1|t|true|y|yes|on)$~i',$W)?'yes':'no');if($z)$L="<a href='$z'".(is_url($z)?target_blank():"").">$L</a>";if(!$z&&!like_bool($l)&&preg_match(number_type(),$l["type"]))$L="<div class='number'>$L</div>";elseif(preg_match('~date~',$l["type"]))$L="<div class='datetime'>$L</div>";return$L;}function
editVal($W,$l){if(preg_match('~date|timestamp~',$l["type"])&&$W!==null)return
preg_replace('~^(\d{2}(\d+))-(0?(\d+))-(0?(\d+))~','$1-$3-$5',$W);return$W;}function
selectColumnsPrint($O,$e){}function
selectSearchPrint($Z,$e,$u){$Z=(array)$_GET["where"];echo'<fieldset id="fieldset-search"><legend>'.'Search'."</legend><div>\n";$vc=array();foreach($Z
as$x=>$W)$vc[$W["col"]]=$x;$r=0;$m=fields($_GET["select"]);foreach($e
as$D=>$gb){$l=$m[$D];if(preg_match("~enum~",$l["type"])||like_bool($l)){$x=$vc[$D];$r--;echo"<div>".h($gb)."<input type='hidden' name='where[$r][col]' value='".h($D)."'>:",(like_bool($l)?" <select name='where[$r][val]'>".optionlist(array(""=>"",'no','yes'),$Z[$x]["val"],true)."</select>":enum_input("checkbox"," name='where[$r][val][]'",$l,(array)$Z[$x]["val"],($l["null"]?0:null))),"</div>\n";unset($e[$D]);}elseif(is_array($E=$this->_foreignKeyOptions($_GET["select"],$D))){if($m[$D]["null"])$E[0]='('.'empty'.')';$x=$vc[$D];$r--;echo"<div>".h($gb)."<input type='hidden' name='where[$r][col]' value='".h($D)."'><input type='hidden' name='where[$r][op]' value='='>: <select name='where[$r][val]'>".optionlist($E,$Z[$x]["val"],true)."</select></div>\n";unset($e[$D]);}}$r=0;foreach($Z
as$W){if(($W["col"]==""||$e[$W["col"]])&&"$W[col]$W[val]"!=""){echo"<div><select name='where[$r][col]'><option value=''>(".'anywhere'.")".optionlist($e,$W["col"],true)."</select>",html_select("where[$r][op]",array(-1=>"")+$this->operators,$W["op"]),"<input type='search' name='where[$r][val]' value='".h($W["val"])."'>".script("mixin(qsl('input'), {onkeydown: selectSearchKeydown, onsearch: selectSearchSearch});","")."</div>\n";$r++;}}echo"<div><select name='where[$r][col]'><option value=''>(".'anywhere'.")".optionlist($e,null,true)."</select>",script("qsl('select').onchange = selectAddRow;",""),html_select("where[$r][op]",array(-1=>"")+$this->operators),"<input type='search' name='where[$r][val]'></div>",script("mixin(qsl('input'), {onchange: function () { this.parentNode.firstChild.onchange(); }, onsearch: selectSearchSearch});"),"</div></fieldset>\n";}function
selectOrderPrint($F,$e,$u){$hd=array();foreach($u
as$x=>$mc){$F=array();foreach($mc["columns"]as$W)$F[]=$e[$W];if(count(array_filter($F,'strlen'))>1&&$x!="PRIMARY")$hd[$x]=implode(", ",$F);}if($hd){echo'<fieldset><legend>'.'Sort'."</legend><div>","<select name='index_order'>".optionlist(array(""=>"")+$hd,($_GET["order"][0]!=""?"":$_GET["index_order"]),true)."</select>","</div></fieldset>\n";}if($_GET["order"])echo"<div style='display: none;'>".hidden_fields(array("order"=>array(1=>reset($_GET["order"])),"desc"=>($_GET["desc"]?array(1=>1):array()),))."</div>\n";}function
selectLimitPrint($y){echo"<fieldset><legend>".'Limit'."</legend><div>";echo
html_select("limit",array("","50","100"),$y),"</div></fieldset>\n";}function
selectLengthPrint($we){}function
selectActionPrint($u){echo"<fieldset><legend>".'Action'."</legend><div>","<input type='submit' value='".'Select'."'>","</div></fieldset>\n";}function
selectCommandPrint(){return
true;}function
selectImportPrint(){return
true;}function
selectEmailPrint($tb,$e){if($tb){print_fieldset("email",'E-mail',$_POST["email_append"]);echo"<div>",script("qsl('div').onkeydown = partialArg(bodyKeydown, 'email');"),"<p>".'From'.": <input name='email_from' value='".h($_POST?$_POST["email_from"]:$_COOKIE["adminer_email"])."'>\n",'Subject'.": <input name='email_subject' value='".h($_POST["email_subject"])."'>\n","<p><textarea name='email_message' rows='15' cols='75'>".h($_POST["email_message"].($_POST["email_append"]?'{$'."$_POST[email_addition]}":""))."</textarea>\n","<p>".script("qsl('p').onkeydown = partialArg(bodyKeydown, 'email_append');","").html_select("email_addition",$e,$_POST["email_addition"])."<input type='submit' name='email_append' value='".'Insert'."'>\n";echo"<p>".'Attachments'.": <input type='file' name='email_files[]'>".script("qsl('input').onchange = emailFileChange;"),"<p>".(count($tb)==1?'<input type="hidden" name="email_field" value="'.h(key($tb)).'">':html_select("email_field",$tb)),"<input type='submit' name='email' value='".'Send'."'>".confirm(),"</div>\n","</div></fieldset>\n";}}function
selectColumnsProcess($e,$u){return
array(array(),array());}function
selectSearchProcess($m,$u){$L=array();foreach((array)$_GET["where"]as$x=>$Z){$La=$Z["col"];$dd=$Z["op"];$W=$Z["val"];if(($x<0?"":$La).$W!=""){$Ra=array();foreach(($La!=""?array($La=>$m[$La]):$m)as$D=>$l){if($La!=""||is_numeric($W)||!preg_match(number_type(),$l["type"])){$D=idf_escape($D);if($La!=""&&$l["type"]=="enum")$Ra[]=(in_array(0,$W)?"$D IS NULL OR ":"")."$D IN (".implode(", ",array_map('intval',$W)).")";else{$xe=preg_match('~char|text|enum|set~',$l["type"]);$X=$this->processInput($l,(!$dd&&$xe&&preg_match('~^[^%]+$~',$W)?"%$W%":$W));$Ra[]=$D.($X=="NULL"?" IS".($dd==">="?" NOT":"")." $X":(in_array($dd,$this->operators)||$dd=="="?" $dd $X":($xe?" LIKE $X":" IN (".str_replace(",","', '",$X).")")));if($x<0&&$W=="0")$Ra[]="$D IS NULL";}}}$L[]=($Ra?"(".implode(" OR ",$Ra).")":"1 = 0");}}return$L;}function
selectOrderProcess($m,$u){$nc=$_GET["index_order"];if($nc!="")unset($_GET["order"][1]);if($_GET["order"])return
array(idf_escape(reset($_GET["order"])).($_GET["desc"]?" DESC":""));foreach(($nc!=""?array($u[$nc]):$u)as$mc){if($nc!=""||$mc["type"]=="INDEX"){$ac=array_filter($mc["descs"]);$gb=false;foreach($mc["columns"]as$W){if(preg_match('~date|timestamp~',$m[$W]["type"])){$gb=true;break;}}$L=array();foreach($mc["columns"]as$x=>$W)$L[]=idf_escape($W).(($ac?$mc["descs"][$x]:$gb)?" DESC":"");return$L;}}return
array();}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return"100";}function
selectEmailProcess($Z,$Pb){if($_POST["email_append"])return
true;if($_POST["email"]){$Td=0;if($_POST["all"]||$_POST["check"]){$l=idf_escape($_POST["email_field"]);$me=$_POST["email_subject"];$B=$_POST["email_message"];preg_match_all('~\{\$([a-z0-9_]+)\}~i',"$me.$B",$Jc);$N=get_rows("SELECT DISTINCT $l".($Jc[1]?", ".implode(", ",array_map('idf_escape',array_unique($Jc[1]))):"")." FROM ".table($_GET["select"])." WHERE $l IS NOT NULL AND $l != ''".($Z?" AND ".implode(" AND ",$Z):"").($_POST["all"]?"":" AND ((".implode(") OR (",array_map('where_check',(array)$_POST["check"]))."))"));$m=fields($_GET["select"]);foreach($this->rowDescriptions($N,$Pb)as$M){$Id=array('{\\'=>'{');foreach($Jc[1]as$W)$Id['{$'."$W}"]=$this->editVal($M[$W],$m[$W]);$sb=$M[$_POST["email_field"]];if(is_mail($sb)&&send_mail($sb,strtr($me,$Id),strtr($B,$Id),$_POST["email_from"],$_FILES["email_files"]))$Td++;}}cookie("adminer_email",$_POST["email_from"]);redirect(remove_from_uri(),lang(array('%d e-mail has been sent.','%d e-mails have been sent.'),$Td));}return
false;}function
selectQueryBuild($O,$Z,$q,$F,$y,$G){return"";}function
messageQuery($J,$ye,$Eb=false){return" <span class='time'>".@date("H:i:s")."</span><!--\n".str_replace("--","--><!-- ",$J)."\n".($ye?"($ye)\n":"")."-->";}function
editFunctions($l){$L=array();if($l["null"]&&preg_match('~blob~',$l["type"]))$L["NULL"]='empty';$L[""]=($l["null"]||$l["auto_increment"]||like_bool($l)?"":"*");if(preg_match('~date|time~',$l["type"]))$L["now"]='now';if(preg_match('~_(md5|sha1)$~i',$l["field"],$A))$L[]=strtolower($A[1]);return$L;}function
editInput($S,$l,$c,$X){if($l["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$c value='-1' checked><i>".'original'."</i></label> ":"").enum_input("radio",$c,$l,($X||isset($_GET["select"])?$X:0),($l["null"]?"":null));$E=$this->_foreignKeyOptions($S,$l["field"],$X);if($E!==null)return(is_array($E)?"<select$c>".optionlist($E,$X,true)."</select>":"<input value='".h($X)."'$c class='hidden'>"."<input value='".h($E)."' class='jsonly'>"."<div></div>".script("qsl('input').oninput = partial(whisper, '".ME."script=complete&source=".urlencode($S)."&field=".urlencode($l["field"])."&value=');
qsl('div').onclick = whisperClick;",""));if(like_bool($l))return'<input type="checkbox" value="1"'.(preg_match('~^(1|t|true|y|yes|on)$~i',$X)?' checked':'')."$c>";$gc="";if(preg_match('~time~',$l["type"]))$gc='HH:MM:SS';if(preg_match('~date|timestamp~',$l["type"]))$gc='[yyyy]-mm-dd'.($gc?" [$gc]":"");if($gc)return"<input value='".h($X)."'$c> ($gc)";if(preg_match('~_(md5|sha1)$~i',$l["field"]))return"<input type='password' value='".h($X)."'$c>";return'';}function
editHint($S,$l,$X){return(preg_match('~\s+(\[.*\])$~',($l["comment"]!=""?$l["comment"]:$l["field"]),$A)?h(" $A[1]"):'');}function
processInput($l,$X,$p=""){if($p=="now")return"$p()";$L=$X;if(preg_match('~date|timestamp~',$l["type"])&&preg_match('(^'.str_replace('\$1','(?P<p1>\d*)',preg_replace('~(\\\\\\$([2-6]))~','(?P<p\2>\d{1,2})',preg_quote('$1-$3-$5'))).'(.*))',$X,$A))$L=($A["p1"]!=""?$A["p1"]:($A["p2"]!=""?($A["p2"]<70?20:19).$A["p2"]:gmdate("Y")))."-$A[p3]$A[p4]-$A[p5]$A[p6]".end($A);$L=($l["type"]=="bit"&&preg_match('~^[0-9]+$~',$X)?$L:q($L));if($X==""&&like_bool($l))$L="'0'";elseif($X==""&&($l["null"]||!preg_match('~char|text~',$l["type"])))$L="NULL";elseif(preg_match('~^(md5|sha1)$~',$p))$L="$p($L)";return
unconvert_field($l,$L);}function
dumpOutput(){return
array();}function
dumpFormat(){return
array('csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($h){}function
dumpTable(){echo"\xef\xbb\xbf";}function
dumpData($S,$le,$J){global$f;$K=$f->query($J,1);if($K){while($M=$K->fetch_assoc()){if($le=="table"){dump_csv(array_keys($M));$le="INSERT";}dump_csv($M);}}}function
dumpFilename($jc){return
friendly_url($jc);}function
dumpHeaders($jc,$Rc=false){$Cb="csv";header("Content-Type: text/csv; charset=utf-8");return$Cb;}function
importServerPath(){}function
homepage(){return
true;}function
navigation($Qc){global$ca;echo'<h1>
',$this->name(),' <span class="version">',$ca,'</span>
<a href="https://aimtechs.co.in"',target_blank(),' id="version">',(version_compare($ca,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($Qc=="auth"){$Kb=true;foreach((array)$_SESSION["pwds"]as$Y=>$Xd){foreach($Xd[""]as$U=>$H){if($H!==null){if($Kb){echo"<ul id='logins'>",script("mixin(qs('#logins'), {onmouseover: menuOver, onmouseout: menuOut});");$Kb=false;}echo"<li><a href='".h(auth_url($Y,"",$U))."'>".($U!=""?h($U):"<i>".'empty'."</i>")."</a>\n";}}}}else{$this->databasesPrint($Qc);if($Qc!="db"&&$Qc!="ns"){$T=table_status('',true);if(!$T)echo"<p class='message'>".'No tables.'."\n";else$this->tablesPrint($T);}}}function
databasesPrint($Qc){}function
tablesPrint($se){echo"<ul id='tables'>",script("mixin(qs('#tables'), {onmouseover: menuOver, onmouseout: menuOut});");foreach($se
as$M){echo'<li>';$D=$this->tableName($M);if(isset($M["Engine"])&&$D!="")echo"<a href='".h(ME).'select='.urlencode($M["Name"])."'".bold($_GET["select"]==$M["Name"]||$_GET["edit"]==$M["Name"],"select")." title='".'Select data'."'>$D</a>\n";}echo"</ul>\n";}function
_foreignColumn($Pb,$d){foreach((array)$Pb[$d]as$Ob){if(count($Ob["source"])==1){$D=$this->rowDescription($Ob["table"]);if($D!=""){$s=idf_escape($Ob["target"][0]);return
array($Ob["table"],$s,$D);}}}}function
_foreignKeyOptions($S,$d,$X=null){global$f;if(list($ue,$s,$D)=$this->_foreignColumn(column_foreign_keys($S),$d)){$L=&$this->_values[$ue];if($L===null){$T=table_status($ue);$L=($T["Rows"]>1000?"":array(""=>"")+get_key_vals("SELECT $s, $D FROM ".table($ue)." ORDER BY 2"));}if(!$L&&$X!==null)return$f->result("SELECT $D FROM ".table($ue)." WHERE $s = ".q($X));return$L;}}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);function
page_header($_e,$k="",$Ca=array(),$Ae=""){global$ba,$ca,$b,$mb,$w;page_headers();if(is_ajax()&&$k){page_messages($k);exit;}$Be=$_e.($Ae!=""?": $Ae":"");$Ce=strip_tags($Be.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>',$Ce,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME)."?file=default.css&version=4.7.1"),'">
',script_src(preg_replace("~\\?.*~","",ME)."?file=functions.js&version=4.7.1");if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.7.1"),'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.7.1"),'">
';foreach($b->css()as$Za){echo'<link rel="stylesheet" type="text/css" href="',h($Za),'">
';}}echo'
<body class="ltr nojs">
';$n=get_temp_dir()."/adminer.version";if(!$_COOKIE["adminer_version"]&&function_exists('openssl_verify')&&file_exists($n)&&filemtime($n)+86400>time()){$Ze=unserialize(file_get_contents($n));$zd="-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwqWOVuF5uw7/+Z70djoK
RlHIZFZPO0uYRezq90+7Amk+FDNd7KkL5eDve+vHRJBLAszF/7XKXe11xwliIsFs
DFWQlsABVZB3oisKCBEuI71J4kPH8dKGEWR9jDHFw3cWmoH3PmqImX6FISWbG3B8
h7FIx3jEaw5ckVPVTeo5JRm/1DZzJxjyDenXvBQ/6o9DgZKeNDgxwKzH+sw9/YCO
jHnq1cFpOIISzARlrHMa/43YfeNRAm/tsBXjSxembBPo7aQZLAWHmaj5+K19H10B
nCpz9Y++cipkVEiKRGih4ZEvjoFysEOdRLj6WiD/uUNky4xGeA6LaJqh5XpkFkcQ
fQIDAQAB
-----END PUBLIC KEY-----
";if(openssl_verify($Ze["version"],base64_decode($Ze["signature"]),$zd)==1)$_COOKIE["adminer_version"]=$Ze["version"];}echo'<script',nonce(),'>
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick',(isset($_COOKIE["adminer_version"])?"":", onload: partial(verifyVersion, '$ca', '".js_escape(ME)."', '".get_token()."')");?>});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = '<?php echo
js_escape('You are offline.'),'\';
var thousandsSeparator = \'',js_escape(','),'\';
</script>

<div id="help" class="jush-',$w,' jsonly hidden"></div>
',script("mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});"),'
<div id="content">
';if($Ca!==null){$z=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($z?$z:".").'">'.$mb[DRIVER].'</a> &raquo; ';$z=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$P=$b->serverName(SERVER);$P=($P!=""?$P:'Server');if($Ca===false)echo"$P\n";else{echo"<a href='".($z?h($z):".")."' accesskey='1' title='Alt+Shift+1'>$P</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Ca)))echo'<a href="'.h($z."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Ca)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Ca
as$x=>$W){$gb=(is_array($W)?$W[1]:h($W));if($gb!="")echo"<a href='".h(ME."$x=").urlencode(is_array($W)?$W[0]:$W)."'>$gb</a> &raquo; ";}}echo"$_e\n";}}echo"<h2>$Be</h2>\n","<div id='ajaxstatus' class='jsonly hidden'></div>\n";restart_session();page_messages($k);$db=&get_session("dbs");if(DB!=""&&$db&&!in_array(DB,$db,true))$db=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");header("X-Frame-Options: deny");header("X-XSS-Protection: 0");header("X-Content-Type-Options: nosniff");header("Referrer-Policy: origin-when-cross-origin");foreach($b->csp()as$Ya){$dc=array();foreach($Ya
as$x=>$W)$dc[]="$x $W";header("Content-Security-Policy: ".implode("; ",$dc));}$b->headers();}function
csp(){return
array(array("script-src"=>"'self' 'unsafe-inline' 'nonce-".get_nonce()."' 'strict-dynamic'","connect-src"=>"'self'","frame-src"=>"https://www.aimtechs.co.in","object-src"=>"'none'","base-uri"=>"'none'","form-action"=>"'self'",),);}function
get_nonce(){static$Vc;if(!$Vc)$Vc=base64_encode(rand_string());return$Vc;}function
page_messages($k){$Ve=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$Pc=$_SESSION["messages"][$Ve];if($Pc){echo"<div class='message'>".implode("</div>\n<div class='message'>",$Pc)."</div>".script("messagesPrint();");unset($_SESSION["messages"][$Ve]);}if($k)echo"<div class='error'>$k</div>\n";}function
page_footer($Qc=""){global$b,$Ee;echo'</div>

';if($Qc!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="Logout" id="logout">
<input type="hidden" name="token" value="',$Ee,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($Qc);echo'</div>
',script("setupSubmitHighlight(document);");}function
int32($C){while($C>=2147483648)$C-=4294967296;while($C<=-2147483649)$C+=4294967296;return(int)$C;}function
long2str($V,$df){$Nd='';foreach($V
as$W)$Nd.=pack('V',$W);if($df)return
substr($Nd,0,end($V));return$Nd;}function
str2long($Nd,$df){$V=array_values(unpack('V*',str_pad($Nd,4*ceil(strlen($Nd)/4),"\0")));if($df)$V[]=strlen($Nd);return$V;}function
xxtea_mx($if,$hf,$oe,$uc){return
int32((($if>>5&0x7FFFFFF)^$hf<<2)+(($hf>>3&0x1FFFFFFF)^$if<<4))^int32(($oe^$hf)+($uc^$if));}function
encrypt_string($je,$x){if($je=="")return"";$x=array_values(unpack("V*",pack("H*",md5($x))));$V=str2long($je,true);$C=count($V)-1;$if=$V[$C];$hf=$V[0];$_d=floor(6+52/($C+1));$oe=0;while($_d-->0){$oe=int32($oe+0x9E3779B9);$ob=$oe>>2&3;for($kd=0;$kd<$C;$kd++){$hf=$V[$kd+1];$Sc=xxtea_mx($if,$hf,$oe,$x[$kd&3^$ob]);$if=int32($V[$kd]+$Sc);$V[$kd]=$if;}$hf=$V[0];$Sc=xxtea_mx($if,$hf,$oe,$x[$kd&3^$ob]);$if=int32($V[$C]+$Sc);$V[$C]=$if;}return
long2str($V,false);}function
decrypt_string($je,$x){if($je=="")return"";if(!$x)return
false;$x=array_values(unpack("V*",pack("H*",md5($x))));$V=str2long($je,false);$C=count($V)-1;$if=$V[$C];$hf=$V[0];$_d=floor(6+52/($C+1));$oe=int32($_d*0x9E3779B9);while($oe){$ob=$oe>>2&3;for($kd=$C;$kd>0;$kd--){$if=$V[$kd-1];$Sc=xxtea_mx($if,$hf,$oe,$x[$kd&3^$ob]);$hf=int32($V[$kd]-$Sc);$V[$kd]=$hf;}$if=$V[$C];$Sc=xxtea_mx($if,$hf,$oe,$x[$kd&3^$ob]);$hf=int32($V[0]-$Sc);$V[0]=$hf;$oe=int32($oe-0x9E3779B9);}return
long2str($V,true);}$f='';$cc=$_SESSION["token"];if(!$cc)$_SESSION["token"]=rand(1,1e6);$Ee=get_token();$pd=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$W){list($x)=explode(":",$W);$pd[$x]=$W;}}function
add_invalid_login(){global$b;$o=file_open_lock(get_temp_dir()."/adminer.invalid");if(!$o)return;$sc=unserialize(stream_get_contents($o));$ye=time();if($sc){foreach($sc
as$tc=>$W){if($W[0]<$ye)unset($sc[$tc]);}}$rc=&$sc[$b->bruteForceKey()];if(!$rc)$rc=array($ye+30*60,0);$rc[1]++;file_write_unlock($o,serialize($sc));}function
check_invalid_login(){global$b;$sc=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$rc=$sc[$b->bruteForceKey()];$Uc=($rc[1]>29?$rc[0]-time():0);if($Uc>0)auth_error(lang(array('Too many unsuccessful logins, try again in %d minute.','Too many unsuccessful logins, try again in %d minutes.'),ceil($Uc/60)));}$ra=$_POST["auth"];if($ra){session_regenerate_id();$Y=$ra["driver"];$P=$ra["server"];$U=$ra["username"];$H=(string)$ra["password"];$h=$ra["db"];set_password($Y,$P,$U,$H);$_SESSION["db"][$Y][$P][$U][$h]=true;if($ra["permanent"]){$x=base64_encode($Y)."-".base64_encode($P)."-".base64_encode($U)."-".base64_encode($h);$xd=$b->permanentLogin(true);$pd[$x]="$x:".base64_encode($xd?encrypt_string($H,$xd):"");cookie("adminer_permanent",implode(" ",$pd));}if(count($_POST)==1||DRIVER!=$Y||SERVER!=$P||$_GET["username"]!==$U||DB!=$h)redirect(auth_url($Y,$P,$U,$h));}elseif($_POST["logout"]){if($cc&&!verify_token()){page_header('Logout','Invalid CSRF token. Send the form again.');page_footer("db");exit;}else{foreach(array("pwds","db","dbs","queries")as$x)set_session($x,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),'Logout successful.'.' ');}}elseif($pd&&!$_SESSION["pwds"]){session_regenerate_id();$xd=$b->permanentLogin();foreach($pd
as$x=>$W){list(,$Ha)=explode(":",$W);list($Y,$P,$U,$h)=array_map('base64_decode',explode("-",$x));set_password($Y,$P,$U,decrypt_string(base64_decode($Ha),$xd));$_SESSION["db"][$Y][$P][$U][$h]=true;}}function
unset_permanent(){global$pd;foreach($pd
as$x=>$W){list($Y,$P,$U,$h)=array_map('base64_decode',explode("-",$x));if($Y==DRIVER&&$P==SERVER&&$U==$_GET["username"]&&$h==DB)unset($pd[$x]);}cookie("adminer_permanent",implode(" ",$pd));}function
auth_error($k){global$b,$cc;$Yd=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$Yd]||$_GET[$Yd])&&!$cc)$k='Session expired, please login again.';else{restart_session();add_invalid_login();$H=get_password();if($H!==null){if($H===false)$k.='<br>'.sprintf('Master password expired. <a href="https://www.aimtechs.co.in/"%s>Implement</a> %s method to make it permanent.',target_blank(),'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$Yd]&&$_GET[$Yd]&&ini_bool("session.use_only_cookies"))$k='Session support must be enabled.';$nd=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$nd["lifetime"]);page_header('Login',$k,null);echo"<form action='' method='post'>\n","<div>";if(hidden_fields($_POST,array("auth")))echo"<p class='message'>".'The action will be performed after successful login with the same credentials.'."\n";echo"</div>\n";$b->loginForm();echo"</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])&&!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header('No extension',sprintf('None of the supported PHP extensions (%s) are available.',implode(", ",$td)),false);page_footer("auth");exit;}stop_session(true);if(isset($_GET["username"])){list($hc,$rd)=explode(":",SERVER,2);if(is_numeric($rd)&&$rd<1024)auth_error('Connecting to privileged ports is not allowed.');check_invalid_login();$f=connect();$i=new
Min_Driver($f);}$Fc=null;if(!is_object($f)||($Fc=$b->login($_GET["username"],get_password()))!==true){$k=(is_string($f)?h($f):(is_string($Fc)?$Fc:'Invalid credentials.'));auth_error($k.(preg_match('~^ | $~',get_password())?'<br>'.'There is a space in the input password which might be the cause.':''));}if($ra&&$_POST["token"])$_POST["token"]=$Ee;$k='';if($_POST){if(!verify_token()){$oc="max_input_vars";$Nc=ini_get($oc);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$x){$W=ini_get($x);if($W&&(!$Nc||$W<$Nc)){$oc=$x;$Nc=$W;}}}$k=(!$_POST["token"]&&$Nc?sprintf('Maximum number of allowed fields exceeded. Please increase %s.',"'$oc'"):'Invalid CSRF token. Send the form again.'.' '.'If you did not send this request from Adminer then close this page.');}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$k=sprintf('Too big POST data. Reduce the data or increase the %s configuration directive.',"'post_max_size'");if(isset($_GET["sql"]))$k.=' '.'You can upload a big SQL file via FTP and import it from server.';}function
email_header($dc){return"=?UTF-8?B?".base64_encode($dc)."?=";}function
send_mail($sb,$me,$B,$Ub="",$Ib=array()){$j=(DIRECTORY_SEPARATOR=="/"?"\n":"\r\n");$B=str_replace("\n",$j,wordwrap(str_replace("\r","","$B\n")));$Ba=uniqid("boundary");$qa="";foreach((array)$Ib["error"]as$x=>$W){if(!$W)$qa.="--$Ba$j"."Content-Type: ".str_replace("\n","",$Ib["type"][$x]).$j."Content-Disposition: attachment; filename=\"".preg_replace('~["\n]~','',$Ib["name"][$x])."\"$j"."Content-Transfer-Encoding: base64$j$j".chunk_split(base64_encode(file_get_contents($Ib["tmp_name"][$x])),76,$j).$j;}$ya="";$ec="Content-Type: text/plain; charset=utf-8$j"."Content-Transfer-Encoding: 8bit";if($qa){$qa.="--$Ba--$j";$ya="--$Ba$j$ec$j$j";$ec="Content-Type: multipart/mixed; boundary=\"$Ba\"";}$ec.=$j."MIME-Version: 1.0$j"."X-Mailer: Adminer Editor".($Ub?$j."From: ".str_replace("\n","",$Ub):"");return
mail($sb,email_header($me),$ya.$B.$qa,$ec);}function
like_bool($l){return
preg_match("~bool|(tinyint|bit)\\(1\\)~",$l["full_type"]);}$f->select_db($b->database());$ad="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";$mb[DRIVER]='Login';if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["download"])){$a=$_GET["download"];$m=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$O=array(idf_escape($_GET["field"]));$K=$i->select($a,$O,array(where($_GET,$m)),$O);$M=($K?$K->fetch_row():array());echo$i->value($M[0],$m[$_GET["field"]]);exit;}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$m=fields($a);$Z=(isset($_GET["select"])?($_POST["check"]&&count($_POST["check"])==1?where_check($_POST["check"][0],$m):""):where($_GET,$m));$Ue=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($m
as$D=>$l){if(!isset($l["privileges"][$Ue?"update":"insert"])||$b->fieldName($l)=="")unset($m[$D]);}if($_POST&&!$k&&!isset($_GET["select"])){$_=$_POST["referer"];if($_POST["insert"])$_=($Ue?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$_))$_=ME."select=".urlencode($a);$u=indexes($a);$Pe=unique_array($_GET["where"],$u);$Cd="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($_,'Item has been deleted.',$i->delete($a,$Cd,!$Pe));else{$Q=array();foreach($m
as$D=>$l){$W=process_input($l);if($W!==false&&$W!==null)$Q[idf_escape($D)]=$W;}if($Ue){if(!$Q)redirect($_);queries_redirect($_,'Item has been updated.',$i->update($a,$Q,$Cd,!$Pe));if(is_ajax()){page_headers();page_messages($k);exit;}}else{$K=$i->insert($a,$Q);$Ac=($K?last_id():0);queries_redirect($_,sprintf('Item%s has been inserted.',($Ac?" $Ac":"")),$K);}}}$M=null;if($_POST["save"])$M=(array)$_POST["fields"];elseif($Z){$O=array();foreach($m
as$D=>$l){if(isset($l["privileges"]["select"])){$oa=convert_field($l);if($_POST["clone"]&&$l["auto_increment"])$oa="''";if($w=="sql"&&preg_match("~enum|set~",$l["type"]))$oa="1*".idf_escape($D);$O[]=($oa?"$oa AS ":"").idf_escape($D);}}$M=array();if(!support("table"))$O=array("*");if($O){$K=$i->select($a,$O,array($Z),$O,array(),(isset($_GET["select"])?2:1));if(!$K)$k=error();else{$M=$K->fetch_assoc();if(!$M)$M=false;}if(isset($_GET["select"])&&(!$M||$K->fetch_assoc()))$M=null;}}if(!support("table")&&!$m){if(!$Z){$K=$i->select($a,array("*"),$Z,array("*"));$M=($K?$K->fetch_assoc():false);if(!$M)$M=array($i->primary=>"");}if($M){foreach($M
as$x=>$W){if(!$Z)$M[$x]=null;$m[$x]=array("field"=>$x,"null"=>($x!=$i->primary),"auto_increment"=>($x==$i->primary));}}}edit_form($a,$m,$M,$Ue);}elseif(isset($_GET["select"])){$a=$_GET["select"];$T=table_status1($a);$u=indexes($a);$m=fields($a);$Rb=column_foreign_keys($a);$Zc=$T["Oid"];parse_str($_COOKIE["adminer_import"],$ia);$Md=array();$e=array();$we=null;foreach($m
as$x=>$l){$D=$b->fieldName($l);if(isset($l["privileges"]["select"])&&$D!=""){$e[$x]=html_entity_decode(strip_tags($D),ENT_QUOTES);if(is_shortable($l))$we=$b->selectLengthProcess();}$Md+=$l["privileges"];}list($O,$q)=$b->selectColumnsProcess($e,$u);$v=count($q)<count($O);$Z=$b->selectSearchProcess($m,$u);$F=$b->selectOrderProcess($m,$u);$y=$b->selectLimitProcess();if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$Qe=>$M){$oa=convert_field($m[key($M)]);$O=array($oa?$oa:idf_escape(key($M)));$Z[]=where_check($Qe,$m);$L=$i->select($a,$O,$Z,$O);if($L)echo
reset($L->fetch_row());}exit;}$vd=$Se=null;foreach($u
as$mc){if($mc["type"]=="PRIMARY"){$vd=array_flip($mc["columns"]);$Se=($O?$vd:array());foreach($Se
as$x=>$W){if(in_array(idf_escape($x),$O))unset($Se[$x]);}break;}}if($Zc&&!$vd){$vd=$Se=array($Zc=>0);$u[]=array("type"=>"PRIMARY","columns"=>array($Zc));}if($_POST&&!$k){$ff=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$Ga=array();foreach($_POST["check"]as$Ea)$Ga[]=where_check($Ea,$m);$ff[]="((".implode(") OR (",$Ga)."))";}$ff=($ff?"\nWHERE ".implode(" AND ",$ff):"");if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");$Ub=($O?implode(", ",$O):"*").convert_fields($e,$m,$O)."\nFROM ".table($a);$Xb=($q&&$v?"\nGROUP BY ".implode(", ",$q):"").($F?"\nORDER BY ".implode(", ",$F):"");if(!is_array($_POST["check"])||$vd)$J="SELECT $Ub$ff$Xb";else{$Oe=array();foreach($_POST["check"]as$W)$Oe[]="(SELECT".limit($Ub,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($W,$m).$Xb,1).")";$J=implode(" UNION ALL ",$Oe);}$b->dumpData($a,"table",$J);exit;}if(!$b->selectEmailProcess($Z,$Rb)){if($_POST["save"]||$_POST["delete"]){$K=true;$ja=0;$Q=array();if(!$_POST["delete"]){foreach($e
as$D=>$W){$W=process_input($m[$D]);if($W!==null&&($_POST["clone"]||$W!==false))$Q[idf_escape($D)]=($W!==false?$W:idf_escape($D));}}if($_POST["delete"]||$Q){if($_POST["clone"])$J="INTO ".table($a)." (".implode(", ",array_keys($Q)).")\nSELECT ".implode(", ",$Q)."\nFROM ".table($a);if($_POST["all"]||($vd&&is_array($_POST["check"]))||$v){$K=($_POST["delete"]?$i->delete($a,$ff):($_POST["clone"]?queries("INSERT $J$ff"):$i->update($a,$Q,$ff)));$ja=$f->affected_rows;}else{foreach((array)$_POST["check"]as$W){$ef="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($W,$m);$K=($_POST["delete"]?$i->delete($a,$ef,1):($_POST["clone"]?queries("INSERT".limit1($a,$J,$ef)):$i->update($a,$Q,$ef,1)));if(!$K)break;$ja+=$f->affected_rows;}}}$B=lang(array('%d item has been affected.','%d items have been affected.'),$ja);if($_POST["clone"]&&$K&&$ja==1){$Ac=last_id();if($Ac)$B=sprintf('Item%s has been inserted.'," $Ac");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$B,$K);if(!$_POST["delete"]){edit_form($a,$m,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$k='Ctrl+click on a value to modify it.';else{$K=true;$ja=0;foreach($_POST["val"]as$Qe=>$M){$Q=array();foreach($M
as$x=>$W){$x=bracket_escape($x,1);$Q[idf_escape($x)]=(preg_match('~char|text~',$m[$x]["type"])||$W!=""?$b->processInput($m[$x],$W):"NULL");}$K=$i->update($a,$Q," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($Qe,$m),!$v&&!$vd," ");if(!$K)break;$ja+=$f->affected_rows;}queries_redirect(remove_from_uri(),lang(array('%d item has been affected.','%d items have been affected.'),$ja),$K);}}elseif(!is_string($Hb=get_file("csv_file",true)))$k=upload_error($Hb);elseif(!preg_match('~~u',$Hb))$k='File must be in UTF-8 encoding.';else{cookie("adminer_import","output=".urlencode($ia["output"])."&format=".urlencode($_POST["separator"]));$K=true;$Oa=array_keys($m);preg_match_all('~(?>"[^"]*"|[^"\r\n]+)+~',$Hb,$Jc);$ja=count($Jc[0]);$i->begin();$Vd=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$N=array();foreach($Jc[0]as$x=>$W){preg_match_all("~((?>\"[^\"]*\")+|[^$Vd]*)$Vd~",$W.$Vd,$Kc);if(!$x&&!array_diff($Kc[1],$Oa)){$Oa=$Kc[1];$ja--;}else{$Q=array();foreach($Kc[1]as$r=>$La)$Q[idf_escape($Oa[$r])]=($La==""&&$m[$Oa[$r]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$La))));$N[]=$Q;}}$K=(!$N||$i->insertUpdate($a,$N,$vd));if($K)$K=$i->commit();queries_redirect(remove_from_uri("page"),lang(array('%d row has been imported.','%d rows have been imported.'),$ja),$K);$i->rollback();}}}$re=$b->tableName($T);if(is_ajax()){page_headers();ob_start();}else
page_header('Select'.": $re",$k);$Q=null;if(isset($Md["insert"])||!support("table")){$Q="";foreach((array)$_GET["where"]as$W){if($Rb[$W["col"]]&&count($Rb[$W["col"]])==1&&($W["op"]=="="||(!$W["op"]&&!preg_match('~[_%]~',$W["val"]))))$Q.="&set".urlencode("[".bracket_escape($W["col"])."]")."=".urlencode($W["val"]);}}$b->selectLinks($T,$Q);if(!$e&&support("table"))echo"<p class='error'>".'Unable to select the table'.($m?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($O,$e);$b->selectSearchPrint($Z,$e,$u);$b->selectOrderPrint($F,$e,$u);$b->selectLimitPrint($y);$b->selectLengthPrint($we);$b->selectActionPrint($u);echo"</form>\n";$G=$_GET["page"];if($G=="last"){$Tb=$f->result(count_rows($a,$Z,$v,$q));$G=floor(max(0,$Tb-1)/$y);}$Qd=$O;$Wb=$q;if(!$Qd){$Qd[]="*";$Ua=convert_fields($e,$m,$O);if($Ua)$Qd[]=substr($Ua,2);}foreach($O
as$x=>$W){$l=$m[idf_unescape($W)];if($l&&($oa=convert_field($l)))$Qd[$x]="$oa AS $W";}if(!$v&&$Se){foreach($Se
as$x=>$W){$Qd[]=idf_escape($x);if($Wb)$Wb[]=idf_escape($x);}}$K=$i->select($a,$Qd,$Z,$Wb,$F,$y,$G,true);if(!$K)echo"<p class='error'>".error()."\n";else{if($w=="mssql"&&$G)$K->seek($y*$G);$ub=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$N=array();while($M=$K->fetch_assoc()){if($G&&$w=="oracle")unset($M["RNUM"]);$N[]=$M;}if($_GET["page"]!="last"&&$y!=""&&$q&&$v&&$w=="sql")$Tb=$f->result(" SELECT FOUND_ROWS()");if(!$N)echo"<p class='message'>".'No rows.'."\n";else{$xa=$b->backwardKeys($a,$re);echo"<div class='scrollable'>","<table id='table' cellspacing='0' class='nowrap checkable'>",script("mixin(qs('#table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true), onkeydown: editingKeydown});"),"<thead><tr>".(!$q&&$O?"":"<td><input type='checkbox' id='all-page' class='jsonly'>".script("qs('#all-page').onclick = partial(formCheck, /check/);","")." <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".'Modify'."</a>");$Tc=array();$Vb=array();reset($O);$Ed=1;foreach($N[0]as$x=>$W){if(!isset($Se[$x])){$W=$_GET["columns"][key($O)];$l=$m[$O?($W?$W["col"]:current($O)):$x];$D=($l?$b->fieldName($l,$Ed):($W["fun"]?"*":$x));if($D!=""){$Ed++;$Tc[$x]=$D;$d=idf_escape($x);$ic=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($x);$gb="&desc%5B0%5D=1";echo"<th>".script("mixin(qsl('th'), {onmouseover: partial(columnMouse), onmouseout: partial(columnMouse, ' hidden')});",""),'<a href="'.h($ic.($F[0]==$d||$F[0]==$x||(!$F&&$v&&$q[0]==$d)?$gb:'')).'">';echo
apply_sql_function($W["fun"],$D)."</a>";echo"<span class='column hidden'>","<a href='".h($ic.$gb)."' title='".'descending'."' class='text'> ↓</a>";if(!$W["fun"]){echo'<a href="#fieldset-search" title="'.'Search'.'" class="text jsonly"> =</a>',script("qsl('a').onclick = partial(selectSearch, '".js_escape($x)."');");}echo"</span>";}$Vb[$x]=$W["fun"];next($O);}}$Dc=array();if($_GET["modify"]){foreach($N
as$M){foreach($M
as$x=>$W)$Dc[$x]=max($Dc[$x],min(40,strlen(utf8_decode($W))));}}echo($xa?"<th>".'Relations':"")."</thead>\n";if(is_ajax()){if($y%2==1&&$G%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($N,$Rb)as$C=>$M){$Pe=unique_array($N[$C],$u);if(!$Pe){$Pe=array();foreach($N[$C]as$x=>$W){if(!preg_match('~^(COUNT\((\*|(DISTINCT )?`(?:[^`]|``)+`)\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\(`(?:[^`]|``)+`\))$~',$x))$Pe[$x]=$W;}}$Qe="";foreach($Pe
as$x=>$W){if(($w=="sql"||$w=="pgsql")&&preg_match('~char|text|enum|set~',$m[$x]["type"])&&strlen($W)>64){$x=(strpos($x,'(')?$x:idf_escape($x));$x="MD5(".($w!='sql'||preg_match("~^utf8~",$m[$x]["collation"])?$x:"CONVERT($x USING ".charset($f).")").")";$W=md5($W);}$Qe.="&".($W!==null?urlencode("where[".bracket_escape($x)."]")."=".urlencode($W):"null%5B%5D=".urlencode($x));}echo"<tr".odd().">".(!$q&&$O?"":"<td>".checkbox("check[]",substr($Qe,1),in_array(substr($Qe,1),(array)$_POST["check"])).($v||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$Qe)."' class='edit'>".'edit'."</a>"));foreach($M
as$x=>$W){if(isset($Tc[$x])){$l=$m[$x];$W=$i->value($W,$l);if($W!=""&&(!isset($ub[$x])||$ub[$x]!=""))$ub[$x]=(is_mail($W)?$Tc[$x]:"");$z="";if(preg_match('~blob|bytea|raw|file~',$l["type"])&&$W!="")$z=ME.'download='.urlencode($a).'&field='.urlencode($x).$Qe;if(!$z&&$W!==null){foreach((array)$Rb[$x]as$Qb){if(count($Rb[$x])==1||end($Qb["source"])==$x){$z="";foreach($Qb["source"]as$r=>$de)$z.=where_link($r,$Qb["target"][$r],$N[$C][$de]);$z=($Qb["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\1'.urlencode($Qb["db"]),ME):ME).'select='.urlencode($Qb["table"]).$z;if($Qb["ns"])$z=preg_replace('~([?&]ns=)[^&]+~','\1'.urlencode($Qb["ns"]),$z);if(count($Qb["source"])==1)break;}}}if($x=="COUNT(*)"){$z=ME."select=".urlencode($a);$r=0;foreach((array)$_GET["where"]as$V){if(!array_key_exists($V["col"],$Pe))$z.=where_link($r++,$V["col"],$V["val"],$V["op"]);}foreach($Pe
as$uc=>$V)$z.=where_link($r++,$uc,$V);}$W=select_value($W,$z,$l,$we);$s=h("val[$Qe][".bracket_escape($x)."]");$X=$_POST["val"][$Qe][bracket_escape($x)];$qb=!is_array($M[$x])&&is_utf8($W)&&$N[$C][$x]==$M[$x]&&!$Vb[$x];$ve=preg_match('~text|lob~',$l["type"]);if(($_GET["modify"]&&$qb)||$X!==null){$Zb=h($X!==null?$X:$M[$x]);echo"<td>".($ve?"<textarea name='$s' cols='30' rows='".(substr_count($M[$x],"\n")+1)."'>$Zb</textarea>":"<input name='$s' value='$Zb' size='$Dc[$x]'>");}else{$Gc=strpos($W,"<i>…</i>");echo"<td id='$s' data-text='".($Gc?2:($ve?1:0))."'".($qb?"":" data-warning='".h('Use edit link to modify this value.')."'").">$W</td>";}}}if($xa)echo"<td>";$b->backwardKeysPrint($xa,$N[$C]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n","</div>\n";}if(!is_ajax()){if($N||$G){$Ab=true;if($_GET["page"]!="last"){if($y==""||(count($N)<$y&&($N||!$G)))$Tb=($G?$G*$y:0)+count($N);elseif($w!="sql"||!$v){$Tb=($v?false:found_rows($T,$Z));if($Tb<max(1e4,2*($G+1)*$y))$Tb=reset(slow_query(count_rows($a,$Z,$v,$q)));else$Ab=false;}}$ld=($y!=""&&($Tb===false||$Tb>$y||$G));if($ld){echo(($Tb===false?count($N)+1:$Tb-$G*$y)>$y?'<p><a href="'.h(remove_from_uri("page")."&page=".($G+1)).'" class="loadmore">'.'Load more data'.'</a>'.script("qsl('a').onclick = partial(selectLoadMore, ".(+$y).", '".'Loading'."…');",""):''),"\n";}}echo"<div class='footer'><div>\n";if($N||$G){if($ld){$Lc=($Tb===false?$G+(count($N)>=$y?2:1):floor(($Tb-1)/$y));echo"<fieldset>";if($w!="simpledb"){echo"<legend><a href='".h(remove_from_uri("page"))."'>".'Page'."</a></legend>",script("qsl('a').onclick = function () { pageClick(this.href, +prompt('".'Page'."', '".($G+1)."')); return false; };"),pagination(0,$G).($G>5?" …":"");for($r=max(1,$G-4);$r<min($Lc,$G+5);$r++)echo
pagination($r,$G);if($Lc>0){echo($G+5<$Lc?" …":""),($Ab&&$Tb!==false?pagination($Lc,$G):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$Lc'>".'last'."</a>");}}else{echo"<legend>".'Page'."</legend>",pagination(0,$G).($G>1?" …":""),($G?pagination($G,$G):""),($Lc>$G?pagination($G+1,$G).($Lc>$G+1?" …":""):"");}echo"</fieldset>\n";}echo"<fieldset>","<legend>".'Whole result'."</legend>";$kb=($Ab?"":"~ ").$Tb;echo
checkbox("all",1,0,($Tb!==false?($Ab?"":"~ ").lang(array('%d row','%d rows'),$Tb):""),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$kb' : checked); selectCount('selected2', this.checked || !checked ? '$kb' : checked);")."\n","</fieldset>\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>Modify</legend><div>
<input type="submit" value="Save"',($_GET["modify"]?'':' title="'.'Ctrl+click on a value to modify it.'.'"'),'>
</div></fieldset>
<fieldset><legend>Selected <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="Edit">
<input type="submit" name="clone" value="Clone">
<input type="submit" name="delete" value="Delete">',confirm(),'</div></fieldset>
';}$Sb=$b->dumpFormat();foreach((array)$_GET["columns"]as$d){if($d["fun"]){unset($Sb['sql']);break;}}if($Sb){print_fieldset("export",'Export'." <span id='selected2'></span>");$jd=$b->dumpOutput();echo($jd?html_select("output",$jd,$ia["output"])." ":""),html_select("format",$Sb,$ia["format"])," <input type='submit' name='export' value='".'Export'."'>\n","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($ub,'strlen'),$e);}echo"</div></div>\n";if($b->selectImportPrint()){echo"<div>","<a href='#import'>".'Import'."</a>",script("qsl('a').onclick = partial(toggle, 'import');",""),"<span id='import' class='hidden'>: ","<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$ia["format"],1);echo" <input type='submit' name='import' value='".'Import'."'>","</span>","</div>";}echo"<input type='hidden' name='token' value='$Ee'>\n","</form>\n",(!$q&&$O?"":script("tableCheck();"));}}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["script"])){if($_GET["script"]=="kill")$f->query("KILL ".number($_POST["kill"]));elseif(list($S,$s,$D)=$b->_foreignColumn(column_foreign_keys($_GET["source"]),$_GET["field"])){$y=11;$K=$f->query("SELECT $s, $D FROM ".table($S)." WHERE ".(preg_match('~^[0-9]+$~',$_GET["value"])?"$s = $_GET[value] OR ":"")."$D LIKE ".q("$_GET[value]%")." ORDER BY 2 LIMIT $y");for($r=1;($M=$K->fetch_row())&&$r<$y;$r++)echo"<a href='".h(ME."edit=".urlencode($S)."&where".urlencode("[".bracket_escape(idf_unescape($s))."]")."=".urlencode($M[0]))."'>".h($M[1])."</a><br>\n";if($M)echo"...\n";}exit;}else{page_header('Server',"",false);if($b->homepage()){echo"<form action='' method='post'>\n","<p>".'Search data in tables'.": <input type='search' name='query' value='".h($_POST["query"])."'> <input type='submit' value='".'Search'."'>\n";if($_POST["query"]!="")search_tables();echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),'<thead><tr class="wrap">','<td><input id="check-all" type="checkbox" class="jsonly">'.script("qs('#check-all').onclick = partial(formCheck, /^tables\[/);",""),'<th>'.'Table','<td>'.'Rows',"</thead>\n";foreach(table_status()as$S=>$M){$D=$b->tableName($M);if(isset($M["Engine"])&&$D!=""){echo'<tr'.odd().'><td>'.checkbox("tables[]",$S,in_array($S,(array)$_POST["tables"],true)),"<th><a href='".h(ME).'select='.urlencode($S)."'>$D</a>";$W=format_number($M["Rows"]);echo"<td align='right'><a href='".h(ME."edit=").urlencode($S)."'>".($M["Engine"]=="InnoDB"&&$W?"~ $W":$W)."</a>";}}echo"</table>\n","</div>\n","</form>\n",script("tableCheck();");}}page_footer();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === true){
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <title>AimTechsWiFi Login</title>
    <style>::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }</style>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="container">
            <div class="navbar-header">
                &nbsp;&nbsp;&nbsp; <a class="navbar-brand" href="/"><b>AimTechsWiFi</b></a>

            </div>
            <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="controlpanel.php">Control Panel</a></li>
                    <li><a href="../users/user_create.php">Create User</a></li>
                    <li><a href="../users/user_login.php">User Login</a></li>
                </ul>
            </div>
        </div>
</nav>
</body>
<?php } ?>
