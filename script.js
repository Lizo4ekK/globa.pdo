const genre = document.getElementById('genre');
const genreList = document.getElementById('list-genre');

const actor = document.getElementById('actor');
const actorList = document.getElementById('list-actor');

const form = document.getElementById('date');
const dateList = document.getElementById('list-date');

const send = async function(data, text = false) {
    return await fetch('/controllers/controller.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => { return text ? response.text() : response.json() });
}

genre.onchange = async function() {
    await send({ event: 'genre', id: this.value })
    .then(res => genreList.innerHTML = res);
}

actor.onchange = async function() {
    await send({ event: 'actor', id: this.value }, true)
    .then(str => new window.DOMParser().parseFromString(str, "text/xml"))
    .then(res => actorList.innerHTML = res['activeElement']['innerHTML']);
}

form.search.onclick = async function(e) {
    e.preventDefault();
    if (!form.from.value || !form.to.value) return;

    await send({ event: 'date', from: form.from.value, to: form.to.value }, true)
    .then(res => dateList.innerHTML = res);
}