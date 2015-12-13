<?php
function selopt($name,$values,$default="",$kv=false){
  $rt = "<br />\n<select name='$name' onblur=\"update();\" onchange=\"update();\">\n";
  if ($kv) {
    foreach($values as $key=>$value){
      $selected = ($default == $value ? "selected=\"selected\"" : "");
      $rt .= "<option value=\"$key\" $selected>$value</option>\n";
    }
  } else {
    foreach($values as $value){
      $selected = ($default == $value ? "selected=\"selected\"" : "");
      $rt .= "<option value=\"$value\" $selected>$value</option>\n";
    }
  }
  $rt .= "</select>\n";
  return $rt;
}
function input($name, $default){
  return "<br />\n<input type=\"text\" name=\"$name\" value=\"$default\" onblur=\"update();\" />\n";
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>minecraft server.properties</title>
<style type="text/css">
 /*<![CDATA[*/
  table, th, td { border: 1px solid black }
/*]]>*/
</style>
<script type="text/javascript">
 //<![CDATA[
    function update()
    {
        var str = "#Minecraft server properties\n";
        var elem = document.getElementById('frmMain').elements;
        for(var i = 0; i < elem.length; i++)
        {
            if (elem[i].name != 'Show Result' && elem[i].name != 'Copy'){
              str += elem[i].name + "=" + elem[i].value + "\n";
            }
        } 
        document.getElementById('txtSvrPrt').value = str;
    }
    function copy(){
        var txt = document.getElementById('txtSvrPrt');
        txt.select();
        var suc;
        try{
            suc = document.execCommand("copy");
        } catch(e) {
            suc = false;
        }
    }
 //]]>
</script>
</head>
<body onload="update();">
<h2>Minecraft server.properties</h2>
<form name="frmMain" id="frmMain" action="server.properties.php">
<table>
<tbody><tr>
<th><span style="white-space:nowrap;">Key</span></th>
<th>Type</th>
<th>Default Value</th>
<th>Description</th>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>allow-flight</b><?php echo selopt("allow-flight", array('true','false'), 'false'); ?></span></th>
<td>boolean</td>
<td>false</td>
<td><span id="allow-flight"></span>Allows users to use flight on your server while in Survival mode, if they have a mod that provides flight installed.
<p>With allow-flight enabled griefers will possibly be more common, because it will make their work easier. In Creative mode this has no effect.</p>
<dl>
<dd><b>false</b> - Flight is not allowed (players in air for at least 5 seconds will be kicked).</dd>
<dd><b>true</b> - Flight is allowed, and used if the player has a fly mod installed.</dd>
</dl>
</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>allow-nether</b><?php echo selopt("allow-nether", array('true','false'), 'true'); ?></span></th>
<td>boolean</td>
<td>true</td>
<td><span id="allow-nether"></span>Allows players to travel to the Nether.
<dl>
<dd><b>false</b> - Nether portals will not work.</dd>
<dd><b>true</b> - The server will allow portals to send players to the Nether.</dd>
</dl>
</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>announce-player-achievements</b><?php echo selopt("announce-player-achievements", array('true','false'), 'true'); ?></span></th>
<td>boolean</td>
<td>true</td>
<td><span id="announce-player-achievements"></span>Allows server to announce when a player gets an achievement.</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>difficulty</b><?php echo selopt("difficulty", array(0=>'Peaceful',1=>'Easy',2=>'Normal',3=>'Hard'), 'Easy', true); ?></span></th>
<td>integer (0-3)</td>
<td>1</td>
<td><span id="difficulty"></span>Defines the difficulty (such as damage dealt by mobs and the way hunger and poison affects players) of the server.
<dl>
<dd><b>0</b> - Peaceful</dd>
<dd><b>1</b> - Easy</dd>
<dd><b>2</b> - Normal</dd>
<dd><b>3</b> - Hard</dd>
</dl>
</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>enable-query</b><?php echo selopt("enable-query", array('true','false'), 'false'); ?></span></th>
<td>boolean</td>
<td>false</td>
<td><span id="enable-query"></span>Enables GameSpy4 protocol server listener. Used to get information about server.</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>enable-rcon</b><?php echo selopt("enable-rcon", array('true','false'), 'false'); ?></span></th>
<td>boolean</td>
<td>false</td>
<td><span id="enable-rcon"></span>Enables remote access to the server console.</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>enable-command-block</b><?php echo selopt("enable-command-block", array('true','false'), 'false'); ?></span></th>
<td>boolean</td>
<td>false</td>
<td><span id="enable-command-block"></span>Enables command blocks</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>force-gamemode</b><?php echo selopt("force-gamemode", array('true','false'), 'false'); ?></span></th>
<td>boolean</td>
<td>false</td>
<td><span id="force-gamemode"></span>Force players to join in the default game mode.
<dl>
<dd><b>false</b> - Players will join in the gamemode they left in.</dd>
<dd><b>true</b> - Players will always join in the default gamemode.</dd>
</dl>
</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>gamemode</b><?php echo selopt("gamemode", array(0=>'Survival',1=>'Creative',2=>'Adventure',3=>'Spectator'), 'Survival', true); ?></span></th>
<td>integer (0-3)</td>
<td>0</td>
<td><span id="gamemode"></span>Defines the mode of gameplay.
<dl>
<dd><b>0</b> - Survival</dd>
<dd><b>1</b> - Creative</dd>
<dd><b>2</b> - Adventure</dd>
<dd><b>3</b> - Spectator</dd>
</dl>
</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>generate-structures</b><?php echo selopt("generate-structures", array('true','false'), 'true'); ?></span></th>
<td>boolean</td>
<td>true</td>
<td><span id="generate-structures"></span>Defines whether structures (such as villages) will be generated.
<dl>
<dd><b>false</b> - Structures will not be generated in new chunks.</dd>
<dd><b>true</b> - Structures will be generated in new chunks.</dd>
</dl>
<p><b>Note:</b> <i>Dungeons will still generate if this is set to false.</i></p>
</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>generator-settings</b><?php echo input('generator-settings') ?></span></th>
<td>string</td>
<td><i>blank</i></td>
<td><span id="generator-settings"></span>The settings used to customize world generation. See Superflat and Customized for possible settings and examples.</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>hardcore</b><?php echo selopt("hardcore", array('true','false'), 'false'); ?></span></th>
<td>boolean</td>
<td>false</td>
<td><span id="hardcore"></span>If set to <b>true</b>, players will be permanently banned if they die.</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>level-name</b><?php echo input("level-name", "world"); ?></span></th>
<td>string</td>
<td>world</td>
<td><span id="level-name"></span>The "level-name" value will be used as the world name and its folder name. You may also copy your saved game folder here, and change the name to the same as that folder's to load it instead.
<dl>
<dd>Characters such as ' (apostrophe) may need to be escaped by adding a backslash before them.</dd>
</dl>
</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>level-seed</b><?php echo input("level-seed", ""); ?></span></th>
<td>string</td>
<td><i>blank</i></td>
<td><span id="level-seed"></span>Add a seed for your world, as in Singleplayer.
<dl>
<dd>Some examples are: minecraft, 404, 1a2b3c.</dd>
</dl>
</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>level-type</b><?php echo selopt("level-type", array('DEFAULT','FLAT','LARGEBIOMES','AMPLIFIED'), 'DEFAULT'); ?></span></th>
<td>string</td>
<td>DEFAULT</td>
<td><span id="level-type"></span>Determines the type of map that is generated.
<dl>
<dd><b>DEFAULT</b> - Standard world with hills, valleys, water, etc.</dd>
<dd><b>FLAT</b> - A flat world with no features, meant for building.</dd>
<dd><b>LARGEBIOMES</b> - Same as default but all biomes are larger.</dd>
<dd><b>AMPLIFIED</b> - Same as default but world-generation height limit is increased.</dd>
<dd><b>CUSTOMIZED</b> - Same as default unless <b>generator-settings</b> is set to a preset.</dd>
</dl>
</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>max-build-height</b><?php echo input("max-build-height", "256"); ?></span></th>
<td>integer</td>
<td>256</td>
<td><span id="max-build-height"></span>The maximum height in which building is allowed. Terrain may still naturally generate above a low height limit.</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>max-players</b><?php echo input( "max-build-players", "20"); ?></span></th>
<td>integer (0-2147483647)</td>
<td>20</td>
<td><span id="max-players"></span>The maximum number of players that can play on the server at the same time. Note that if more players are on the server it will use more resources. Note also, op player connections are not supposed to count against the max players, but ops currently cannot join a full server. Extremely large values for this field result in the client-side user list being broken.</td>
</tr>
<tr>
<th><span style="white-space: nowrap;"><b>max-tick-time</b><?php echo input( "max-tick-time", "60000"); ?></span><br /></th>
<td>integer (0–(2^63 - 1))</td>
<td>60000</td>
<td><span id="max-tick-time"></span>The maximum number of milliseconds a single tick may take before the server watchdog stops the server with the message, <i>A single server tick took 60.00 seconds (should be max 0.05); Considering it to be crashed, server will forcibly shutdown.</i> Once this criteria is met, it calls System.exit(1).
<dl>
<dd><b>-1</b> - disable watchdog entirely (this disable option was added in 14w32a)</dd>
</dl>
</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>max-world-size</b><?php echo input( "max-world-size", "29999984"); ?></span><br /></th>
<td>integer (1-29999984)</td>
<td>29999984</td>
<td><span id="max-world-size"></span>This sets the maximum possible size in blocks, expressed as a radius, that the world border can obtain. Setting the world border bigger causes the commands to complete successfully but the actual border will not move past this block limit. Setting the max-world-size higher than the default doesn't appear to do anything.
<p>Examples:</p>
<ul>
<li>Setting max-world-size to 1000 will allow you to have a 2000x2000 world border.</li>
<li>Setting max-world-size to 4000 will give you an 8000 x 8000 world border.</li>
</ul>
</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>motd</b><?php echo input( "motd", "A Minecraft Server"); ?></span></th>
<td>string</td>
<td><i>A Minecraft Server</i></td>
<td><span id="motd"></span>This is the message that is displayed in the server list of the client, below the name.
<ul>
<li>The MOTD does support color and formatting codes.</li>
<li>The MOTD supports special characters, such as "♥". However, such characters must be converted to escaped Unicode form. An online converter can be found here</li>
<li>If the MOTD is over 59 characters, the server list will likely report a communication error.</li>
</ul>
</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>network-compression-threshold</b><?php echo input( "network-compression-threshold", "256"); ?></span><br /></th>
<td>integer</td>
<td>256</td>
<td><span id="network-compression-threshold"></span>By default it allows packets that are <i>n-1</i> bytes big to go normally, but a packet that <i>n</i> bytes or more will be compressed down. So, lower number means more compression but compressing small amounts of bytes might actually end up with a larger result than what went in.
<dl>
<dd><b>-1</b> - disable compression entirely</dd>
<dd><b>0</b> - compress everything</dd>
</dl>
<p><b>Note:</b> <i>The Ethernet spec requires that packets less than 64 bytes become padded to 64 bytes. Thus, setting a value lower than 64 may not be beneficial. It is also not recommended to exceed the MTU, typically 1500 bytes.</i></p>
</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>online-mode</b><?php echo selopt("online-mode", array('true','false'), 'true'); ?></span></th>
<td>boolean</td>
<td>true</td>
<td><span id="online-mode"></span>Server checks connecting players against minecraft's account database. Only set this to false if your server is <b>not</b> connected to the Internet. Hackers with fake accounts can connect if this is set to false! If minecraft.net is down or inaccessible, no players will be able to connect if this is set to true. Setting this variable to off purposely is called "cracking" a server, and servers that are presently with online mode off are called "cracked" servers, allowing players with unlicensed copies of Minecraft to join.
<dl>
<dd><b>true</b> - Enabled. The server will assume it has an Internet connection and check every connecting player.</dd>
<dd><b>false</b> - Disabled. The server will not attempt to check connecting players.</dd>
</dl>
</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>op-permission-level</b><?php echo selopt("op-permission-level", array('1','2','3','4'), '4'); ?></span></th>
<td>integer (1-4)</td>
<td>4</td>
<td><span id="op-permission-level"></span>Sets permission level for ops.
<dl>
<dd><b>1</b> - Ops can bypass spawn protection.</dd>
<dd><b>2</b> - Ops can use /clear, /difficulty, /effect, /gamemode, /gamerule, /give, and /tp, and can edit command blocks.</dd>
<dd><b>3</b> - Ops can use /ban, /deop, /kick, and /op.</dd>
<dd><b>4</b> - Ops can use /stop.</dd>
</dl>
</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>player-idle-timeout</b><?php echo input('player-idle-timeout','0') ?></span></th>
<td>integer</td>
<td>0</td>
<td><span id="player-idle-timeout"></span>If non-zero, players are kicked from the server if they are idle for more than that many minutes.
<dl>
<dd><b>Note:</b> <i>Idle time is reset when the server receives one of the following packets:</i>
<ul>
<li>102 (0x66) WindowClick</li>
<li>108 (0x6c) ButtonClick</li>
<li>130 (0x82) UpdateSign</li>
<li>14 (0xe) BlockDig</li>
<li>15 (0xf) Place</li>
<li>16 (0x10) BlockItemSwitch</li>
<li>18 (0x12) ArmAnimation</li>
<li>19 (0x13) EntityAction</li>
<li>205 (0xcd) ClientCommand</li>
<li>3 (0x3) Chat</li>
<li>7 (0x7) UseEntity</li>
</ul>
</dd>
</dl>
</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>pvp</b><?php echo selopt("pvp", array('true','false'), 'true'); ?></span></th>
<td>boolean</td>
<td>true</td>
<td><span id="pvp"></span>Enable PvP on the server. Players shooting themselves with arrows will only receive damage if PvP is enabled.
<dl>
<dd><b>true</b> - Players will be able to kill each other.</dd>
<dd><b>false</b> - Players cannot kill other players (also known as <b>Player versus Environment</b> (<b>PvE</b>)).</dd>
</dl>
<p><b>Note:</b> <i>Indirect damage sources spawned by players (such as lava, fire, TNT and to some extent water, sand and gravel) will still deal damage to other players.</i></p>
</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>query.port</b><?php echo input('query.port','25565'); ?></span></th>
<td>integer (1-65534)</td>
<td>25565</td>
<td><span id="query.port"></span>Sets the port for the query server (see <b>enable-query</b>).</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>rcon.password</b><?php echo input('rcon.password',''); ?></span></th>
<td>string</td>
<td><i>blank</i></td>
<td><span id="rcon.password"></span>Sets the password to rcon.</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>rcon.port</b><?php echo input('rcon.port','25575'); ?></span></th>
<td>integer (1-65534)</td>
<td>25575</td>
<td><span id="rcon.port"></span>Sets the port to rcon.</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>resource-pack</b><?php echo input('resource-pack',''); ?></span></th>
<td>string</td>
<td><i>blank</i></td>
<td><span id="resource-pack"></span>Optional URI to a resource pack. The player may choose to use it.</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>resource-pack-hash</b><?php echo input('resource-pack-hash',''); ?></span><br /></th>
<td>string</td>
<td><i>blank</i></td>
<td><span id="resource-pack-hash"></span>Optional SHA-1 digest of the resource pack, in lowercase hexadecimal. It's recommended to specify this. This is not yet used to verify the integrity of the resource pack, but improves the effectiveness and reliability of caching.</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>server-ip</b><?php echo input('server-ip',''); ?></span></th>
<td>string</td>
<td><i>blank</i></td>
<td><span id="server-ip"></span>Set this if you want the server to bind to a particular IP. It is strongly recommended that you leave server-ip blank!
<dl>
<dd>Set to blank, or the IP you want your server to run (listen) on.</dd>
</dl>
</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>server-port</b><?php echo input('server-port','25565'); ?></span></th>
<td>integer (1-65534)</td>
<td>25565</td>
<td><span id="server-port"></span>Changes the port the server is hosting (listening) on. This port must be forwarded if the server is hosted in a network using NAT (If you have a home router/firewall).</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>snooper-enabled</b><?php echo selopt("snooper-enabled", array('true','false'), 'true'); ?></span></th>
<td>boolean</td>
<td>true</td>
<td><span id="snooper-enabled"></span>Sets whether the server sends snoop data regularly to http://snoop.minecraft.net.
<dl>
<dd><b>false</b> - disable snooping.</dd>
<dd><b>true</b> - enable snooping.</dd>
</dl>
</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>spawn-animals</b><?php echo selopt("spawn-animals", array('true','false'), 'true'); ?></span></th>
<td>boolean</td>
<td>true</td>
<td><span id="spawn-animals"></span>Determines if animals will be able to spawn.
<dl>
<dd><b>true</b> - Animals spawn as normal.</dd>
<dd><b>false</b> - Animals will immediately vanish.</dd>
</dl>
<p><i>Tip: if you have major lag, turn this off/set to false.</i></p>
</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>spawn-monsters</b><?php echo selopt("spawn-monsters", array('true','false'), 'true'); ?></span></th>
<td>boolean</td>
<td>true</td>
<td><span id="spawn-monsters"></span>Determines if monsters will be spawned.
<dl>
<dd><b>true</b> - Enabled. Monsters will appear at night and in the dark.</dd>
<dd><b>false</b> - Disabled. No monsters.</dd>
</dl>
<p>This does nothing if difficulty = 0 (peaceful) <i>Unless your difficulty is not set to 0, when a monster can still spawn from a Monster Spawner.</i> <i>Tip: if you have major lag, turn this off/set to false.</i></p>
</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>spawn-npcs</b><?php echo selopt("spawn-npcs", array('true','false'), 'true'); ?></span></th>
<td>boolean</td>
<td>true</td>
<td><span id="spawn-npcs"></span>Determines if villagers will be spawned.
<dl>
<dd><b>true</b> - Enabled. Villagers will spawn.</dd>
<dd><b>false</b> - Disabled. No villagers.</dd>
</dl>
</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>spawn-protection</b><?php echo input('spawn-protection','16'); ?></span></th>
<td>integer</td>
<td>16</td>
<td><span id="spawn-protection"></span>Determines the radius of the spawn protection. Setting this to 0 will not disable spawn protection. 0 will protect the single block at the spawn point. 1 will protect a 3x3 area centered on the spawn point. 2 will protect 5x5, 3 will protect 7x7, etc. This option is not generated on the first server start and appears when the first player joins. If there are no ops set on the server, the spawn protection will be disabled automatically.</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>use-native-transport</b><?php echo selopt("use-native-transport", array('true','false'), 'true'); ?></span></th>
<td>boolean</td>
<td>true</td>
<td><span id="use-native-transport"></span>Linux server performance improvements: optimized packet sending/receiving on Linux
<dl>
<dd><b>true</b> - Enabled. Enable Linux packet sending/receiving optimization</dd>
<dd><b>false</b> - Disabled. Disable Linux packet sending/receiving optimization</dd>
</dl>
</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>view-distance</b><?php echo selopt("view-distance", array(3,4,5,6,7,8,9,10,11,12,13,14,15), 10); ?></span></th>
<td>integer (3-15)</td>
<td>10</td>
<td><span id="view-distance"></span>Sets the amount of world data the server sends the client, measured in chunks in each direction of the player (radius, not diameter). It determines the server-side viewing distance. (see Render distance)
<p><i>10 is the default/recommended. If you have major lag, reduce this value.</i></p>
</td>
</tr>
<tr>
<th><span style="white-space:nowrap;"><b>white-list</b><?php echo selopt("white-list", array('true','false'), 'false'); ?></span></th>
<td>boolean</td>
<td>false</td>
<td><span id="white-list"></span>Enables a whitelist on the server.
<p>With a whitelist enabled, users not on the whitelist will be unable to connect. Intended for private servers, such as those for real-life friends or strangers carefully selected via an application process, for example.</p>
<dl>
<dd><b>false</b> - No white list is used.</dd>
<dd><b>true</b> - The file whitelist.json is used to generate the white list.</dd>
</dl>
<p><b>Note:</b> <i>Ops are automatically white listed, and there is no need to add them to the whitelist.</i></p>
</td>
</tr>
</tbody></table>
<input type="button" name="Show Result" value="Show Result" onclick="update();" />
<input type="button" name="Copy" value="Copy" onclick="copy();" />
</form>
<h2>server.properties</h2>
<textarea name="txtSvrPrt" id="txtSvrPrt" rows="42" cols="50"> </textarea>
</body>
</html>
