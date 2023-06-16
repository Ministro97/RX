<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewReaction</title>

    <link rel="stylesheet" href="new.css">




<body>

<div class='wrapper'>

        <div class="boxinput">

        <h1>REACTION</h1>
        
    <form action="upload.php"  method="post" enctype="multipart/form-data">
    <label for="file">Carica un'immmagine (PNG, JPG, JPEG)</label>

       
       
        
        <input type="file" name="fileToUpload" id="fileToUpload"   accept=".png, .jpg, .jpeg" onchange="onMyfileChange(this)" />
   
     





<br><br>


        
        <div class="form-group">
            <label for="exampleInputEmail1">Nome reaction</label>
            <input type="text" name="reaction" class="form-control"  autocomplete="off"  maxlength="10" >
        </div><br>
        <div class="form-group">
            <label for="exampleInputEmail1">Rarità</label>
            <input list="rarityNRX" id="rarity" name="rarity" class="form-control" autocomplete="off">
            <datalist id="rarityNRX">
    <option value="Folle">
    <option value="Assai">
    <option value="Puro">
    <option value="Duro">
    <option value="Raro">
    <option value="Vero">   
    </datalist>

    <br><br>
    
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">typegen</label>
            <input list="typegenRX" name="typegen" class="form-control" autocomplete="off">
            <datalist id="typegenRX">
    <option value="Love">
    <option value="Weed">
    <option value="OnFire">
    <option value="Psico">
    <option value="Night"> 
    <option value="Fresh">   
    </datalist>
        </div>

<br>



<div class="form-group">

            <label for="nft">Converti in NFT</label>
            <input type="checkbox" id="nft" name="nft" value="">
  
        </div>
<br>
        <button type="submit" id="button_6">
<strong>Crea la mia reaction</strong> </button>
    </form>

    <br>
       <h1>NFT REACTION</h1>
  
    <form action="verify.php"  method="post" enctype="multipart/form-data">
    <label for="file">Carica una reaction (PNG)</label>

       
        
        <input type="file" name="fileToUpload" id="fileToUpload"   accept=".png" onchange="onMyfileChange(this)" value="" />
   
     

    
<br>

 
        
<div class="form-group">
    <label for="exampleInputEmail1">Nome reaction</label>
    <input type="text" name="reaction" class="form-control"  autocomplete="off"  maxlength="10" >
</div><br>
<div class="form-group">
    <label for="exampleInputEmail1">Rarità</label>
    <input list="rarityNRX" id="rarity" name="rarity" class="form-control" autocomplete="off">
    <datalist id="rarityNRX">
<option value="Folle">
<option value="Assai">
<option value="Puro">
<option value="Duro">
<option value="Raro">
<option value="Vero">   
</datalist>

<br>

</div>

<div class="form-group">
    <label for="exampleInputEmail1">Typegen</label>
    <input list="typegenRX" name="typegen" class="form-control" autocomplete="off">
    <datalist id="typegenRX">
<option value="Love">
<option value="Weed">
<option value="OnFire">
<option value="Psico">
<option value="Night"> 
<option value="Fresh">   
</datalist>
</div>

<br>




<br>

<button type="submit" id="button_6">
<strong>Converti in NFT</strong> </button>
    </form>




</div>



<script src="https://unpkg.com/[email protected]/dist/jszip.js" type="text/javascript"></script>
    <script type="text/javascript">
        function onMyfileChange(fileInput) {
            if (fileInput.files[0] == undefined) {
                return;
            }

            var filename = fileInput.files[0].name;
            // var filesize = fileInput.files[0].size;
            var reader = new FileReader();
            reader.onload = function(ev) {
                console.log("File", filename, ":");
                // 
                crypto.subtle.digest('SHA-256', ev.target.result).then(hashBuffer => {
                    // Convert hex to hash, see https://developer.mozilla.org/en-US/docs/Web/API/SubtleCrypto/digest#converting_a_digest_to_a_hex_string
                    const hashArray = Array.from(new Uint8Array(hashBuffer));
                    const hashHex = hashArray.map(b => b.toString(16).padStart(2, '0')).join(''); // convert bytes to hex string
                  
                    var val = document.getElementById('nft').value = hashHex
console.log(val)
                }).catch(ex => console.error(ex));
            };
            reader.onerror = function(err) {
                console.error("Failed to read file", err);
            }
            reader.readAsArrayBuffer(fileInput.files[0]);
        }



      
    </script>






    




</body>

</html>