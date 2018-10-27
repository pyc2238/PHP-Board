<html>
<head>
<script language="javascript">
function show_Banner(num){
 for(i=0;i<5;i++){
  if(num==i){
   Rand_Banner[i].style.dispaly="";
  }
  else
  {
   Rand_Banner[i].style.display="none";
  }
 }
}
</script>
</head>
<body topmargin="0" leftmargin="0">
<div id=Rand_Banner><a href="/" onfocus="this.blur();"><img src=./img/1.jpg border="0" alt="1"></a></div>
<div id=Rand_Banner><a href="/" onfocus="this.blur();"><img src=./img/2-1.jpg border="0" alt="2"></a></div>
<div id=Rand_Banner><a href="/" onfocus="this.blur();"><img src=./img/2-2.jpg border="0" alt="3"></a></div>
<div id=Rand_Banner><a href="/" onfocus="this.blur();"><img src=./img/2-1.jpg border="0" alt="4"></a></div>
<div id=Rand_Banner><a href="/" onfocus="this.blur();"><img src=./img/2-2.jpg border="0" alt="5"></a></div>
<script language="javascript">
var R=Math.floor(Math.random()*5);
show_Banner(R);
</script>
</body>
</table>