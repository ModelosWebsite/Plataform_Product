function openTab(evt, tabName) {
    var i, tabcontent, tablinks;

    // Esconde todos os conteúdos
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Remove a classe "active" de todos os botões
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("active");
    }

    // Mostra o conteúdo selecionado
    document.getElementById(tabName).style.display = "block";

    // Adiciona a classe "active" ao botão clicado
    evt.currentTarget.classList.add("active");
}

// Quando a página carregar, abre o primeiro tablinks ativo
document.addEventListener("DOMContentLoaded", function () {
    var firstActive = document.querySelector(".tablinks.active");
    if (firstActive) {
        var defaultTab = firstActive.getAttribute("onclick").match(/'([^']+)'/)[1];
        document.getElementById(defaultTab).style.display = "block";
        firstActive.classList.add("active"); // garante destaque
    } else {
        // fallback: se não houver active, ativa o primeiro
        var firstTab = document.querySelector(".tablinks");
        if (firstTab) {
            var defaultTab2 = firstTab.getAttribute("onclick").match(/'([^']+)'/)[1];
            document.getElementById(defaultTab2).style.display = "block";
            firstTab.classList.add("active");
        }
    }
});
