function showModal(url,url2){
   

    var modal = document.getElementById("myModal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    modal.style.display = "block";

    var modelcontent = modal.getElementsByClassName("modal-content")[0];

    var par = document.createElement("p");

    var createA = document.createElement('a');
        var createAText = document.createTextNode("Supprimer");
        createA.setAttribute('href', url);
        createA.className="btn btn-danger btn-fw";
        createA.type="button btn-md";
        createA.appendChild(createAText);

    var createB = document.createElement('a');
        var createBText = document.createTextNode("Annuler");
        createB.setAttribute('href', url2);
        createB.className="btn btn-light btn-fw";
        createB.type="button btn-md";
        createB.appendChild(createBText);

        
        par.appendChild(createA);
        par.appendChild(createB);

        modelcontent.appendChild(par);

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modal.style.display = "none";
        par.remove();
        }
    
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            par.remove();
        }
        }
    

}
