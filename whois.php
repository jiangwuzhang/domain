<?php
// JSON DATA sender
header("Content-Type: application/json");
// Developed by William AGAY - Open Source. Free to copy, edit etc.
// Get data from $_POST
// Domain name without www in $_POST['domain']
/*
 *      CODE
 *
 *      1 : unexpected POST data
 *      2 : Invalid TLD
 *      3 : Available
 *      4 : Taken
 */
$result = array();
if(isset($_REQUEST['domain']) AND !empty($_REQUEST['domain'])){
        $whois_serveurs = array("ac" => "whois.nic.ac", 
                                                        "al" => "whois.ripe.net", 
                                                        "am" => "whois.amnic.net", 
                                                        "as" => "whois.nic.as",
                                                         "at" => "whois.ripe.net",
                                                         "au" => "whois.aunic.net",
                                                         "az" => "whois.ripe.net",
                                                         "ba" => "whois.ripe.net",
                                                         "be" => "whois.ripe.net",
                                                         "bg" => "whois.ripe.net",
                                                         //"biz" => "whois.neulevel.biz",
                                                         "biz" => "whois.nic.biz",
                                                         "br" => "whois.registro.br",
                                                         "by" => "whois.ripe.net",
                                                         "ca" => "whois.cira.ca",
                                                         "cc" => "whois.nic.cc",
                                                         "ch" => "whois.nic.ch",
                                                         "ck" => "whois.ck-nic.org.ck",
                                                         "cn" => "whois.cnnic.net.cn",
                                                         "com" => "whois.crsnic.net",
                                                         "cx" => "whois.nic.cx",
                                                         "cy" => "whois.ripe.net",
                                                         "cz" => "whois.nic.cz",
                                                         "de" => "whois.denic.de",
                                                         "dk" => "whois.dk-hostmaster.dk",
                                                         "dz" => "whois.ripe.net",
                                                         "edu" => "rs.internic.net",
                                                         "ee" => "whois.ripe.net",
                                                         "eg" => "whois.ripe.net",
                                                         "es" => "whois.ripe.net",
                                                         "eu" => "whois.eu",
                                                         "fi" => "whois.ripe.net",
                                                         "fj" => "whois.usp.ac.fj",
                                                         "fo" => "whois.ripe.net",
                                                         "fr" => "whois.nic.fr",
                                                         "gb" => "whois.ripe.net",
                                                         "ge" => "whois.ripe.net",
                                                         "gov" => "whois.nic.gov",
                                                         "gr" => "whois.ripe.net",
                                                         "gs" => "whois.adamsnames.tc",
                                                         "hk" => "whois.hknic.net.hk",
                                                         "hm" => "whois.registry.hm",
                                                         "hr" => "whois.ripe.net",
                                                         "hu" => "whois.ripe.net",
                                                         "id" => "whois.idnic.net.id",
                                                         "ie" => "whois.domainregistry.ie",
                                                         "info" => "whois.afilias.net",
                                                         "int" => "whois.isi.edu",
                                                         "il" => "whois.ripe.net",
                                                         "is" => "whois.isnet.is",
                                                         "it" => "whois.nic.it",
                                                         "jp" => "whois.nic.ad.jp",
                                                         "ke" => "whois.rg.net",
                                                         "kg" => "whois.domain.kg",
                                                         "kr" => "whois.nic.or.kr",
                                                         "kz" => "whois.domain.kz",
                                                         "li" => "whois.nic.li",
                                                         "lk" => "whois.nic.lk",
                                                         "lt" => "whois.ripe.net",
                                                         "lu" => "whois.ripe.net",
                                                         "lv" => "whois.ripe.net",
                                                         "ma" => "whois.ripe.net",
                                                         "md" => "whois.ripe.net",
                                                         "mil" => "whois.nic.mil",
                                                         "mk" => "whois.ripe.net",
                                                         "mm" => "whois.nic.mm",
                                                         "ms" => "whois.adamsnames.tc",
                                                         "mt" => "whois.ripe.net",
                                                         "mx" => "whois.nic.mx",
                                                         "net" => "rs.internic.net",
                                                         "nl" => "whois.domain-registry.nl",
                                                         "no" => "whois.norid.no",
                                                         "nu" => "whois.nic.nu",
                                                         "nz" => "whois.domainz.net.nz",
                                                         "org" => "whois.pir.org",
                                                         "pl" => "whois.ripe.net",
                                                         "pk" => "whois.pknic.net.pk",
                                                         "pt" => "whois.ripe.net",
                                                         "ro" => "whois.ripe.net",
                                                         "ru" => "whois.ripn.ru",
                                                         "se" => "whois.nic-se.se",
                                                         "sg" => "whois.nic.net.sg",
                                                         "si" => "whois.ripe.net",
                                                         "sh" => "whois.nic.sh",
                                                         "sk" => "whois.ripe.net",
                                                         "sm" => "whois.ripe.net",
                                                         "st" => "whois.nic.st",
                                                         "su" => "whois.ripe.net",
                                                         "tc" => "whois.adamsnames.tc",
                                                         "tf" => "whois.adamsnames.tc",
                                                         "tj" => "whois.nic.tj",
                                                         "th" => "whois.thnic.net",
                                                         "tm" => "whois.nic.tm",
                                                         "tn" => "whois.ripe.net",
                                                         "to" => "whois.tonic.to",
                                                         "tr" => "whois.ripe.net",
                                                         "tw" => "whois.twnic.net",
                                                         "ua" => "whois.ripe.net",
                                                         "uk" => "whois.nic.uk",
                                                         "us" => "whois.isi.edu",
                                                         "va" => "whois.ripe.net",
                                                         "vg" => "whois.adamsnames.tc",
                                                         "ws" => "whois.nic.ws",
                                                         "yu" => "whois.ripe.net",
                                                         "za" => "whois.frd.ac.za");
                
        $parseur = explode(".", $_POST['domain']);
    $hote = $whois_serveurs[strtolower($parseur[count($parseur) - 1])];
    $buf = NULL;
      
    if (empty($hote)) {
        $result['status'] = FALSE;
        $result['code'] = 2;
    } else {
            $fp = fsockopen($hote, 43, $errno, $errstr, 10);
          fputs($fp, $_POST['domain'] . "\r\n");
          while (!feof($fp)) {
              $row = fgets($fp, 128);
              $buf .= $row;
              if (eregi("Whois Server:", $row))
                  $server = trim(str_replace("Whois Server:", "", $row));
          }
          fclose($fp);
          
          if (
          ereg("No match for", $buf) || 
          ereg("NOT FOUND", $buf) || 
          ereg("Status:      FREE", $buf) || 
          ereg("No entries found", $buf) ||
          ereg("Not found", $buf) ||
          ereg("AVAIL", $buf)) {
              // AVAILABLE
              $result['status'] = TRUE;
              $result['code'] = 3;
          } else {
              // TAKEN
              $result['status'] = FALSE;
              $result['code'] = 4;
              
              $result['whois_data'] = $buf;
              
              /*if ($server) {
                  $fp = fsockopen($server, 43, $errno, $errstr, 10);
                  fputs($fp, $_POST['domain'] . "\r\n");
                  while (!feof($fp))
                      print fgets($fp, 128);
                  fclose($fp);
              } else {
                  echo "<pre>$buf</pre>";
              }*/
          }
    }
}
else{
        $result['status'] = FALSE;
        $result['code'] = 1;
}
        echo json_encode($result);
?>
