  {{-- Javascript --}}
  <script>
    const tabs = document.querySelectorAll(".container-scroll button");
    const rightArrow = document.querySelector(".container-scroll .iconChevron-right i");
    const leftArrow = document.querySelector(".container-scroll .iconChevron-left i");
    const tabsList = document.querySelector(".container-scroll ul");
    const leftArrowContainer = document.querySelector(".container-scroll .iconChevron-left");
    const rightArrowContainer = document.querySelector(".container-scroll .iconChevron-right");

    const removeAllActiveClasse = () => {
    tabs.forEach((tab) => {
        tab.classList.remove("active");
    })
    }

    tabs.forEach((tab) => {
    tab.addEventListener("click", () => {
        removeAllActiveClasse();
        tab.classList.add("active");
    })
    });

    const manageIcons = () => {
    if(tabsList.scrollLeft >= 20) {
        leftArrowContainer.classList.add("active");
    }else {
        leftArrowContainer.classList.remove("active");
    }

    let maxScrollValue = tabsList.scrollWidth - tabsList.clientWidth - 20;

    if(tabsList.scrollLeft >= maxScrollValue) {
        rightArrowContainer.classList.remove("active");
    }else {
        rightArrowContainer.classList.add("active");
    }
    }

    rightArrow.addEventListener("click", () => {
    manageIcons();
    tabsList.scrollLeft += 200;
    });

    leftArrow.addEventListener("click", () => {
    manageIcons();
    tabsList.scrollLeft -= 200;
    });

    tabsList.addEventListener("scroll", manageIcons);

    /* Eventos Mouse Para Movimentar com este Evento */
    let dragging = false;

    const drag = (e) => {
    // Se for falso executa este evento: MouseMove
    if(!dragging) return;

    tabsList.classList.add("dragging");
    tabsList.scrollLeft -= e.movementX; 
    }

    // Evento MouseMove
    tabsList.addEventListener("mousemove", drag);

    // Evento MouseDown
    tabsList.addEventListener("mousedown", () => {
    dragging = true;
    });

    // Evento MouseUp
    document.addEventListener("mouseup", () => {
    dragging = false;
    tabsList.classList.remove("dragging");
    })
</script> 

<script>
let currentScrollPosition = 0;
let scrollAmount = 320;

let sCont = document.queryselector(".storys-container"):
let hScroll = document.queryselector(".horizontal-scroll");

let maxScroll = -sCont.offsetwidth + hScroll.offsetwidth;

function scrollHorizontally(val) {
  currentScrollPosition += (val * scrollAmount);

  sCont.style.left = currentScrollPosition + "px";

}
</script>  