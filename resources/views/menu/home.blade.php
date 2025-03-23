@extends('index')
@section('title', 'Laman Home')
@section('content')
    <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
    <main class="flex-1 overflow-auto p-5 space-y-4">
        <!-- Card Form Pengukuran -->
        <div class="bg-gray-50 p-4 rounded-lg shadow">
            <h3 class="text-center font-semibold mb-3">Form Pengisian Data</h3>
            <h6 class="text-center text-xs text-gray-400 italic font-extralight mb-3">
                *Isi Informasi untuk Keperluan Pengukuran
            </h6>
            <form action="{{ route('home.store') }}" method="POST" class="space-y-3">
                @csrf
                <!-- Notifikasi Validasi Error -->
                @if ($errors->any())
                    <div class="p-3 mb-3 text-sm text-red-700 bg-red-100 rounded-lg">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div>
                    <label class="block text-left text-sm font-medium text-gray-600">Nama</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-lg bg-gray-200 text-gray-600"
                        value="{{ auth()->user()->name }}" readonly />
                </div>
                <div>
                    <label class="block text-left text-sm font-medium text-gray-600">Umur</label>
                    <input type="number" name="age"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="Masukkan Umur" />
                </div>
                <div>
                    <label class="block text-left text-sm font-medium text-gray-600">Jenis Kelamin</label>
                    <select name="gender"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <!-- Card Hasil Pengukuran -->
                <div class="bg-gray-50 p-4 rounded-lg shadow">
                    <h3 class="text-center font-semibold mb-3">Hasil Pengukuran Device</h3>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="bg-white p-3 rounded-lg shadow flex flex-col items-center">
                            <div class="bg-green-200 p-2 rounded-full">
                                <span class="text-green-700 text-[10px] font-bold uppercase">Sistolik</span>
                            </div>
                            <div class="flex flex-col items-center mt-2">
                                <input type="text" name="sistolik" id="sys"
                                    class="w-full text-center px-2 py-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                                    placeholder="Masukkan Sistolik" pattern="\d+(\.\d+)?" />
                                <p class="text-xs text-gray-500">mmHg</p>
                            </div>
                        </div>
                        <div class="bg-white p-3 rounded-lg shadow flex flex-col items-center">
                            <div class="bg-blue-200 p-2 rounded-full">
                                <span class="text-blue-700 text-[10px] font-bold uppercase">Diastolik</span>
                            </div>
                            <div class="flex flex-col items-center mt-2">
                                <input type="text" name="diastolik" id="dia"
                                    class="w-full text-center px-2 py-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="Masukkan Diastolik" pattern="\d+(\.\d+)?" />
                                <p class="text-xs text-gray-500">mmHg</p>
                            </div>
                        </div>
                        <div class="bg-white p-3 rounded-lg shadow flex flex-col items-center">
                            <div class="bg-red-200 p-2 rounded-full flex items-center justify-center">
                                <span class="text-red-700 text-lg">❤️</span>
                            </div>
                            <div class="flex flex-col items-center mt-2">
                                <input type="text" name="bpm" id="bpm"
                                    class="w-full text-center px-2 py-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                    placeholder="Masukkan BPM" pattern="\d+(\.\d+)?" />
                                <p class="text-xs text-gray-500">BPM</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Buttons Scan & Submit -->
                <div class="flex justify-between">
                    <button type="button" id="scanButton"
                        class="w-1/2 bg-gray-600 text-white py-2 rounded-lg hover:bg-gray-700 mr-2">Scan</button>
                    <button type="submit"
                        class="w-1/2 bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 ml-2">Submit</button>
                </div>
            </form>
        </div>
    </main>

    <script>
        const client = mqtt.connect('wss://broker.emqx.io:8084/mqtt');
        let isScanEnabled = false; // Toggle state for Scan button

        // MQTT Connection
        client.on('connect', () => {
            console.log('Connected to MQTT broker');
            client.subscribe('healthmonitor/data', (err) => {
                if (!err) {
                    console.log('Subscribed to topic: healthmonitor/data');
                } else {
                    console.error('Subscription failed:', err);
                }
            });
        });

        // Handle incoming messages
        client.on('message', (topic, message) => {
            console.log('Received message:', message.toString());

            if (isScanEnabled) {
                const data = message.toString().split(',');
                console.log('Parsed data:', {
                    sys: data[0],
                    dia: data[1],
                    bpm: data[2]
                });

                const sysInput = document.getElementById('sys');
                const diaInput = document.getElementById('dia');
                const bpmInput = document.getElementById('bpm');

                if (sysInput && diaInput && bpmInput) {
                    sysInput.value = parseFloat(data[0]).toFixed(2);
                    diaInput.value = parseFloat(data[1]).toFixed(2);
                    bpmInput.value = parseFloat(data[2]).toFixed(2);
                    console.log('Input elements updated with decimal values');
                } else {
                    console.error('One or more input elements not found');
                }
            } else {
                console.log('Scan is disabled, ignoring incoming data');
            }
        });

        // Toggle Scan functionality
        const scanButton = document.getElementById('scanButton');
        if (scanButton) {
            scanButton.addEventListener('click', () => {
                isScanEnabled = !isScanEnabled; // Toggle state
                scanButton.textContent = isScanEnabled ? 'Stop Scan' : 'Scan';
                scanButton.classList.toggle('bg-gray-600', !isScanEnabled);
                scanButton.classList.toggle('bg-gray-700', !isScanEnabled);
                scanButton.classList.toggle('bg-red-600', isScanEnabled);
                scanButton.classList.toggle('bg-red-700', isScanEnabled);
                console.log(`Scan ${isScanEnabled ? 'enabled' : 'disabled'}`);
            });
        } else {
            console.error('Scan button not found');
        }
    </script>

@endsection
