function irParaCompra(btn) {
    const capa = btn.getAttribute('data-img');
    const titulo = btn.getAttribute('data-title');
    const genero = btn.getAttribute('data-genero');
    const plataforma = btn.getAttribute('data-plataforma');
    const desenvolvedora = btn.getAttribute('data-desenvolvedora');
    const estoque = btn.getAttribute('data-estoque');
    const preco = btn.getAttribute('data-preco');
    window.location.href = `compra.php?titulo=${encodeURIComponent(titulo)}&capa=${encodeURIComponent(capa)}&genero=${encodeURIComponent(genero)}&plataforma=${encodeURIComponent(plataforma)}&desenvolvedora=${encodeURIComponent(desenvolvedora)}&estoque=${encodeURIComponent(estoque)}&preco=${encodeURIComponent(preco)}`;
}

window.onload = function () {
    const params = new URLSearchParams(window.location.search);
    document.getElementById('titulo').textContent = params.get('titulo');
    document.getElementById('capa').src = params.get('capa');
    document.getElementById('genero').textContent = params.get('genero');
    document.getElementById('plataforma').textContent = params.get('plataforma');
    document.getElementById('desenvolvedora').textContent = params.get('desenvolvedora');
    document.getElementById('estoque').textContent = params.get('estoque');
    document.getElementById('preco').textContent = "R$ " + params.get('preco');
}