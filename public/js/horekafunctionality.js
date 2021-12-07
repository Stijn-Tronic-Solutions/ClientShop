function incrementProduct(id,upDown){
  $amountInput = document.getElementById(id+'amount');
  if (upDown == "+") $amountInput.value = parseInt($amountInput.value) + 1;
  else if (upDown == "-") {
    if ($amountInput.value > 1) $amountInput.value = parseInt($amountInput.value) - 1;
  }
  // Else just don't do a thing
  return;
}

function selectExtra(id,extraID){
  $label = document.getElementById(String(id)+String(extraID)+"label");
  $selectedExtras = document.getElementById(id + 'extras');
  if(!$selectedExtras.value.includes(extraID)) {
    $selectedExtras.value += String(extraID);
    $label.style.fontWeight = "bold";

  }

  else{
    $label.style.fontWeight = "normal";
    $selectedExtras.value = $selectedExtras.value.replace(extraID, "");
  }
}
