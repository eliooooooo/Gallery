<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./../src/output.css" rel="stylesheet">
    <title>Eliott's gallery</title>
</head>
<body x-init="getAlbums()" x-data="Albums()" @keydown.escape="lightboxOpen = false" @scroll.window="atTop = (window.pageYOffset < 50) ? true: false">
    <header class="flex flex-col md:flex-row gap-4 md:gap-10 items-center bg-primary text-white px-10 py-6 h-32 md:h-20">
        <div class="w-full md:w-auto flex flex-row items-center justify-start gap-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="cursor-pointer bi bi-list" viewBox="0 0 16 16" x-show="!asideOpen" @click="asideOpen = true" x-cloak>
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="cursor-pointer bi bi-x-lg" viewBox="0 0 16 16" x-show="asideOpen" @click="asideOpen = false" x-cloak>
                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
            </svg>
            <h1 class="font-bold text-2xl select-none" >Eliott's&nbsp;gallery</h1>
        </div>
        <div class="search-bar flex flex-row gap-2 w-full">
            <input type="text" placeholder="Entrez votre recherche" class="border border-primary-light text-primary px-3 py-2 w-full rounded">
            <button class="bg-secondary rounded text-primary px-3 py-2 hover:bg-primary-light hover:text-secondary-light transition">Rechercher</button>            
        </div>
    </header>
    <main class="relative flex flex-row items-stretch min-h-[calc(100ch-8rem)] md:min-h-[calc(100vh-5rem)] bg-secondary-light">
        <aside class="bg-primary-light pt-8 px-3 md:px-6 w-40 md:w-60 absolute h-full sm:h-auto sm:relative z-20" x-show="asideOpen" x-cloak>
            <div class="flex flex-col gap-6 sticky top-10">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="cursor-pointer bi bi-x-lg ml-auto mr-4" :class="atTop ? 'hidden' : 'block'" viewBox="0 0 16 16" x-show="asideOpen" @click="asideOpen = false" x-cloak>
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                </svg>
                <h2 class="text-xl font-bold">Albums</h2>
                <ul class="flex flex-col gap-2 [&>li>a]:underline">
                    <template x-for="(album, index) in albums">
                        <li class="text-lg">
                            <a class="cursor-pointer" :class=" index+1 == albumDetails.id ? 'font-bold' : '' " x-text="album.name" @click="getAlbumDetails(album.id)"></a>
                        </li>
                    </template>
                </ul>
            </div>
        </aside>
        <div class="w-full px-6 py-8">
            <article class="mb-16 sm:mb-10">
                <header class="mb-6">
                    <h1 class="text-3xl font-bold text-primary-light" x-text="albumDetails.name" ></h1>
                    <p x-text="albumDetails.description"></p>
                </header>
                <div class="bg-secondary rounded p-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 2xl:grid-cols-8 gap-4">
                    <h2 class="col-span-full text-xl font-bold text-primary">Photos <span>(</span><span x-text="albumDetails.pictures ? albumDetails.pictures.length : 0"></span><span> éléments )</span></h2>
                    <template x-for="picture in albumDetails.pictures">
                        <div class="col-span-1 aspect-square relative group" @click="setLightbox(picture.url, picture.legend)">
                            <img :src="picture.url" :alt="picture.legend" class="w-full h-full object-cover rounded">
                            <div class="absolute rounded bg-black/50 w-full h-full top-0 left-0 hidden group-hover:block cursor-pointer"></div>
                            <p class="absolute cursor-pointer w-full p-4 text-white top-1/2 left-1/2 text-center -translate-x-1/2 -translate-y-1/2 hidden group-hover:inline-block" x-text="picture.legend"></p>
                        </div>
                    </template>
                </div>
            </article>
        </div>

        <div class="fixed top-0 left-0 w-full h-full bg-black/50 flex flex-col gap-2 items-center justify-center" x-cloak x-show="lightboxOpen">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="cursor-pointer bi bi-x-lg ml-auto mr-4 text-white" viewBox="0 0 16 16" x-cloak @click="lightboxOpen = false">
                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
            </svg>
            <div class="flex flex-col gap-0 items-center justify-center bg-secondary">
                <img :src="imageUrl" class="mx-auto max-w-full max-h-full" alt="Image en plein écran">
                <p x-text="imageDesc" class="w-full text-center text-primary px-3 py-2"></p>
            </div>
        </div>

        <footer class="w-full absolute bottom-0 z-30">
            <p class="text-center bg-primary text-white py-4 px-6 w-full">Copyright © 2024 Eliott's gallery - Développé par Eliott BURKLE</p>
        </footer>
    </main>

    <script>
        function Albums() {
            return {
                atTop: true,
                asideOpen: true,
                lightboxOpen: false,
                imageUrl: '',
                imageDesc: '',
                albums: [],
                albumDetails: {},
                init() {
                    const urlParams = new URLSearchParams(window.location.search);
                    const albumId = urlParams.get('id');
                    if (albumId) {
                        this.getAlbumDetails(albumId);
                    } else {
                        this.getAlbums(1);
                    }
                },
                getAlbums() {
                    fetch('./getAlbums.php')
                        .then(response => response.json())
                        .then(data => {
                            this.albums = data.albums;
                        });
                },
                getAlbumDetails(albumId) {
                    fetch('./getAlbumDetails.php?id=' + albumId)
                        .then(response => response.json())
                        .then(data => {
                            this.updateUrl(albumId);
                            this.albumDetails = data.album;
                        });
                },
                setLightbox(imageUrl, desc) {
                    this.imageUrl = imageUrl;
                    this.imageDesc = desc;
                    this.lightboxOpen = true;
                },
                updateUrl(id){
                    window.history.pushState({}, '', `?id=${id}`);
                }
            }
        }
    </script>
    <script type="module" src="./../src/main.js"></script>
</body>
</html>