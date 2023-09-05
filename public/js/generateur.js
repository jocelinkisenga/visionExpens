<script>
function generatePDF(){
    //nom du fichier | file name
    var nom_fichier = prompt("Nom du fichier PDF :");
    //generer le pdf
    var element = document.getElementById('text');
    var opt = {
            margin:  0.5,
            filename:     `${nom_fichier}.pdf`,
            image:        { type: 'jpeg', quality: 1 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
        };
    if(nom_fichier != null){
        html2pdf().set(opt).from(element).save()
    }else {
        alert("Veuillez choisir un nom ")
    }
}
</script>