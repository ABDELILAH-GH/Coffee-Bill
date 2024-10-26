// Heure
function afficherHeure() {
 const date = new Date();
 let heures = date.getHours();      
 let minutes = date.getMinutes();    
 let secondes = date.getSeconds();  
 const heureFormatee = `${heures}:${minutes}:${secondes}`;
 document.getElementById('heure').textContent = heureFormatee;
}
afficherHeure();
setInterval(afficherHeure, 1000); // Met à jour chaque seconde