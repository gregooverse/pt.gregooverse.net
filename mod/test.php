<?php if(!defined('PT_GREGOOVERSE_NET')) exit; ?>
<?php crumbs::add('.dll generator'); ?>


<pre class="brush: sql">
--%s
UPDATE clandb.dbo.cl SET siegemoney=siegemoney+%I64d WHERE userid='%s' AND delactive=0
</pre>

<div class="accordion">
    <h3><a href="#">First header</a></h3>
    <div>First content</div>
    <h3><a href="#">Second header</a></h3>
    <div>Second content</div>
</div>

<div class="accordion">
    <h3><a href="#">First header</a></h3>
    <div>First content</div>
    <h3><a href="#">Second header</a></h3>
    <div>Second content</div>
</div>




<div class="tabs">
	<ul>
		<li><a href="#tabs-1">Nunc tincidunt</a></li>
	</ul>
	<div id="tabs-1">
            <pre class="brush: sql">
--%s
UPDATE clandb.dbo.cl SET siegemoney=siegemoney+%I64d WHERE userid='%s' AND delactive=0
            </pre>
	</div>
</div>


<pre class="brush: asm">
00435C6B  |.  83C4 04       ADD ESP,4
00435C6E  |.  83E8 00       SUB EAX,0                                ; Switch (cases 0..2, 4 exits)
00435C71  |.  74 32         JE SHORT 00435CA5
00435C73  |.  48            DEC EAX
00435C74  |.  74 19         JE SHORT 00435C8F
00435C76  |.  48            DEC EAX
00435C77  |.  75 40         JNE SHORT 00435CB9
00435C79  |.  C705 84A78B00 MOV DWORD PTR DS:[8BA784],500            ; Case 2 of switch client.435C6E
00435C83  |.  C705 88A78B00 MOV DWORD PTR DS:[8BA788],400
00435C8D  |.  EB 2A         JMP SHORT 00435CB9
00435C8F  |>  C705 84A78B00 MOV DWORD PTR DS:[8BA784],400            ; Case 1 of switch client.435C6E
00435C99  |.  C705 88A78B00 MOV DWORD PTR DS:[8BA788],300
00435CA3  |.  EB 14         JMP SHORT 00435CB9
00435CA5  |>  C705 84A78B00 MOV DWORD PTR DS:[8BA784],320            ; Case 0 of switch client.435C6E
00435CAF  |.  C705 88A78B00 MOV DWORD PTR DS:[8BA788],258
00435CB9  |>  8B0D 98E35E00 MOV ECX,DWORD PTR DS:[5EE398]            ; ASCII "SOFTWARE\Triglow Pictures\PristonTale", default case of switch client.435C6E
</pre>

blah blah blah

<p>blah blah blah</p>

<?php data::read('/etc/prout'); ?>