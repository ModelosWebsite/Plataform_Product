class Cookies {
    static STORAGE_KEY = '@cookies';
    
    constructor() {
        this.init();
    }

    get hasAccepted() {
        return localStorage.getItem(Cookies.STORAGE_KEY) === 'true';
    }

    set hasAccepted(value) {
        localStorage.setItem(Cookies.STORAGE_KEY, String(value));
    }

    get template() {
        return `
            <div id="cookies" class="wrapper" style="background-color: var(--background)">
                <div class="content">
                    <header>Política de Cookies</header>
                    <p>
                        Usamos cookies em nosso site para ver como você interage com ele. 
                        Ao aceitar este banner, você concorda com o uso de tais cookies.
                    </p>
                    <div class="buttons">
                        <button class="item" style="color: var(--background)" id="cookies-accept">Aceitar</button>
                        <button class="item" style="color: var(--background)" id="cookies-reject">Rejeitar</button>
                    </div>
                </div>
            </div>
        `;
    }

    createBanner() {
        if (!document.querySelector("#cookies")) {
            document.body.insertAdjacentHTML('beforeend', this.template);
            this.addEventListeners();
        }
    }

    addEventListeners() {
        document.querySelector("#cookies-accept")?.addEventListener("click", () => this.accept());
        document.querySelector("#cookies-reject")?.addEventListener("click", () => this.reject());
    }

    removeBanner() {
        document.querySelector("#cookies")?.remove();
    }

    accept() {
        this.hasAccepted = true;
        this.removeBanner();
    }

    reject() {
        this.removeBanner(); // Apenas remove, sem salvar
    }

    init() {
        if (!this.hasAccepted) {
            this.createBanner();
        }
    }
}

// Exemplo de uso
const cookies = new Cookies();