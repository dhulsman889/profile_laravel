function map(page) {
    // Defenieer de pagina's van paginanummers naar paginanamen
    const map = {
        0: 'home',
        1: 'about/about',
        2: 'contact',
        3: 'about/pc'
    }
    console.log("selected page:", map[page]);

    // Geef de paginanaam terug
    return map[page];
}

async function setContent(pagenr) {
    try {
        // Haal de pagina op en zet deze in de content div
        const page = await fetch(`./components/${map(pagenr)}.html`);
        document.getElementById('content').innerHTML = await page.text();
    } catch (err) {
        console.log(err);
    }
}

function changetext() {
    document.getElementById('homebutton').innerHTML = new Date().toLocaleTimeString();

    for (let i = 0; i < 11; i++) {
        setTimeout(() => {
            document.getElementById('content').style.backgroundColor = 'red';
            document.getElementById('title').style.backgroundColor = 'red';
            document.getElementById('footer').style.backgroundColor = 'red';
            document.getElementById('content').innerHTML = `<h1>Countdown: ${10 - i}</h1>`;
            console.log(i);
            setTimeout(() => {
                document.getElementById('content').style.backgroundColor = 'white';
                document.getElementById('title').style.backgroundColor = 'rgb(0, 128, 255)';
                document.getElementById('footer').style.backgroundColor = 'rgb(0, 128, 255)';
            }, 500); // Change background color back to white after 500ms
            if (i == 10) {
                document.getElementById('content').innerHTML = `<h1>You just waited for nothing</h1><br><button onclick="document.location.reload()">Go back</button>`;
            }
        }, i * 1000); // Delay each iteration by i * 1000ms (1 second)
    }
}

// Wanneer het js bestand is ingeladen, ga standaard naar de home pagina
// setContent(0);