<header>
    <div class="title">{{ $place->name }}</div>
    <div class="addplacectl" onclick="document.location.href='/places/{{ urlencode($place->name) }}/photos/add'; return false;">
        <div class="plus"><a href="/places/{{ urlencode($place->name) }}/photos/add" class="latent">+</a></div>
        <div class="plabel"><span><a href="/places/{{ urlencode($place->name) }}/photos/add" class="latent">Добавить фотографию</a></span></div>
    </div>
    <div class="comeback" onclick="document.location.href='/places'; return false;">
        <div class="plabel"><a href="/places" class="latent">Назад</a></div>
    </div>
    <br clear="all"/>
</header>

