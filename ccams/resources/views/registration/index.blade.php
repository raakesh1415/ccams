<x-layout>
    <div class="container mt-5">
        <h2 class="text-center"><b>JENIS KELAB</b></h2>
        <div class="row mt-4">

            <!-- Kelab / Persatuan-->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/std_kelab.jpeg') }}" class="card-img-top" alt="Kelab / Persatuan">
                    <div class="card-body d-flex flex-column">
                        <h3 class="text-center">Persatuan</h3>
                        <p class="card-text text-justify">Merangkumi pelbagai kelab dan persatuan, termasuk
                            kelab akademik, seni dan kebudayaan, membolehkan pelajar mengembangkan minat dan bakat
                            mereka di luar bilik darjah sambil memupuk kerja berpasukan dan nilai kepimpinan.</p>
                        <a href="{{ route('registration.persatuan') }}" class="btn btn-dark mt-auto">Meneroka</a>
                    </div>
                </div>
            </div>

            <!-- Sukan / Permainan -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/std_sukan.png') }}" class="card-img-top" alt="Sukan / Permainan">
                    <div class="card-body d-flex flex-column">
                        <h3 class="text-center">Sukan</h3>
                        <p class="card-text text-justify">Aktiviti yang melibatkan sukan dan permainan untuk
                            menggalakkan pelajar untuk kekal aktif, sihat, dan bina semangat kesukanan. Melalui sukan,
                            pelajar belajar disiplin, strategi, dan kerja berpasukan.</p>
                        <a href="{{ route('registration.sukan') }}" class="btn btn-dark mt-auto">Meneroka</a>
                    </div>
                </div>
            </div>

            <!-- Unit Beruniform -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/std_beruniform.png') }}" class="card-img-top" alt="Unit Beruniform">
                    <div class="card-body d-flex flex-column">
                        <h3 class="text-center">Unit Beruniform</h3>
                        <p class="card-text text-justify">Termasuk unit seperti Pengakap, Kadet dan Ambulans St. John
                            yang menyediakan latihan dalam ketahanan fizikal, kepimpinan dan kemahiran hidup sambil
                            menanamkan patriotisme dan disiplin di kalangan pelajar.</p>
                        <a href="{{ route('registration.beruniform') }}" class="btn btn-dark mt-auto">Meneroka</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
