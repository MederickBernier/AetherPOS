<?php

function capitalizeItemName($name){
  // Words to exclude from capitalization
  $exclusions = ['of','and','the'];

  // Split the name into words
  $words = explode(' ', $name);

  // Capitalize each word if it's not in the exclusion list
  $capitalizedWords = array_map(function($word) use ($exclusions) {
      return in_array(strtolower($word), $exclusions) ? $word : ucfirst(strtolower($word));
  }, $words);

  // Join the words back together
  return implode(' ', $capitalizedWords);
}

function serversArray(){
    $servers = [
        "Adamantoise@Aether",
        "Cactuar@Aether",
        "Faerie@Aether",
        "Gilgamesh@Aether",
        "Jenova@Aether",
        "Midgarsormr@Aether",
        "Sargatanas@Aether",
        "Siren@Aether",
        "Balmung@Crystal",
        "Brynhildr@Crystal",
        "Coeurl@Crystal",
        "Diabolos@Crystal",
        "Goblin@Crystal",
        "Malboro@Crystal",
        "Mateus@Crystal",
        "Zalera@Crystal",
        "Behemoth@Primal",
        "Excalibur@Primal",
        "Exodus@Primal",
        "Famfrit@Primal",
        "Hyperion@Primal",
        "Lamia@Primal",
        "Leviathan@Primal",
        "Ultros@Primal",
        "Halicarnassus@Dynamis",
        "Maduin@Dynamis",
        "Marilith@Dynamis",
        "Seraph@Dynamis",
        "Cerberus@Chaos",
        "Louisois@Chaos",
        "Moogle@Chaos",
        "Omega@Chaos",
        "Phantom@Chaos",
        "Ragnarok@Chaos",
        "Sagittarius@Chaos",
        "Spriggan@Chaos",
        "Alpha@Light",
        "Lich@Light",
        "Odin@Light",
        "Phoenix@Light",
        "Raiden@Light",
        "Shiva@Light",
        "Twintania@Light",
        "Zodiark@Light",
        "Aegis@Elemental",
        "Atomos@Elemental",
        "Carbuncle@Elemental",
        "Garuda@Elemental",
        "Gungnir@Elemental",
        "Kujata@Elemental",
        "Tonberry@Elemental",
        "Typhon@Elemental",
        "Alexander@Gaia",
        "Bahamut@Gaia",
        "Durandal@Gaia",
        "Fenrir@Gaia",
        "Ifrit@Gaia",
        "Ridill@Gaia",
        "Tiamat@Gaia",
        "Ultima@Gaia",
        "Anima@Mana",
        "Asura@Mana",
        "Chocobo@Mana",
        "Hades@Mana",
        "Ixion@Mana",
        "Masamune@Mana",
        "Padaemonium@Mana",
        "Titan@Mana",
        "Belias@Meteor",
        "Mandragora@Meteor",
        "Ramuh@Meteor",
        "Shinryu@Meteor",
        "Unicorn@Meteor",
        "Valefor@Meteor",
        "Yojimbo@Meteor",
        "Zeromus@Meteor",
        "Bismarck@Materia",
        "Ravana@Materia",
        "Sephirot@Materia",
        "Sophia@Materia",
        "Zurvan@Materia"
    ];

    return $servers;
}

function sendToLog($msg){
    \Log::info("Message to be logged: ". $msg);
}
