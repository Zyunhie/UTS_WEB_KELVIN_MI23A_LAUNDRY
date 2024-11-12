<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('MEMBER') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 flex items-center justify-between">
                    <div>DATA MEMBER</div>
                    <div>
                        <a href="#" onclick="return functionAdd()"
                            class="bg-sky-600 p-2 hover:bg-sky-400 text-white rounded-xl">Add</a>
                    </div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        NO
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        NAMA
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        ALAMAT
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        JENIS KELAMIN
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        JENIS KELAMIN
                                    </th>
                                    <th scope="col" class="px-6 py-3">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($member as $key => $k)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $member->perPage() * ($member->currentPage() - 1) + $key + 1 }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $k->nama }}  
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $k->alamat }}  
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $k->jenis_kelamin }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <button type="button" data-id="{{ $k->id }}"
                                                data-modal-target="sourceModalEdit" data-nama="{{ $k->nama }}" data-alamat="{{ $k->alamat }}"
                                                data-jenis_kelamin="{{ $k->jenis_kelamin }}" onclick="editSourceModal(this)"
                                                class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                Edit
                                            </button>
                                            <button onclick="return memberDelete('{{$k->id}}','{{$k->member}}')" class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $member->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50" onclick="sourceModalClose()"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        Tambah Sumber Database
                    </h3>
                    <button type="button" onclick="sourceModalClose()"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="flex flex-col p-4 space-y-6">
                        <div class="mb-5">
                            <label for="base-input"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input name="nama" type="text" id="base-input"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-5">
                            <label for="base-input"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                            <input name="alamat" type="text" id="base-input"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-5">
                            <label for="jenis_kelamin"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                name="jenis_kelamin" data-placeholder="Pilih Jenis Kelamin">
                                <option value="">Pilih...</option>
                                <option value="Perempuan">P</option>
                                <option value="Laki-Laki">L</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButton"
                            class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                        <button type="button" onclick="sourceModalClose()"
                            class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModalEdit">
        <div class="fixed inset-0 bg-black opacity-50" onclick="sourceModalClose()"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        Update Member
                    </h3>
                    <button type="button" onclick="sourceModalClose()"
                        class="text-black bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModalEdit">
                    @csr
                        <div class="flex flex-col p-4 space-y-6">
                            <div class="">
                                <label for="text"
                                    class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                                <input type="text" id="nama" name="nama"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan Nama disini...">
                            </div>
                        </div>
                        <div class="flex flex-col p-4 space-y-6">
                            <div class="">
                                <label for="text"
                                    class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                                <input type="text" id="alamat" name="alamat"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan Alamat disini...">
                            </div>
                        </div>
                        <div class="mb-5">
                            <label for="jenis_kelamin"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                            <select id="jenis_kelamin_edit"
                                class="js-example-placeholder-single js-states form-control w-full" name="jenis_kelamin"
                                data-placeholder="Pilih Jenis Kelamin">
                                <option value="">Pilih...</option>
                                <option value="Perempuan">P</option>
                                <option value="Laki-Laki">L</option>
                            </select>
                        </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButtonEdit"
                            class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                        <button type="button" onclick="sourceModalClose()"
                            class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const functionAdd = () => {
            const formModal = document.getElementById('formSourceModal');
            const modal = document.getElementById('sourceModal');

            // Set form action URL
            let url = "{{ route('member.store') }}";
            document.getElementById('title_source').innerText = "Add Jurusan";
            formModal.setAttribute('action', url);

            // Display the modal
            modal.classList.remove('hidden');
            modal.classList.add('flex');

            // Ensure CSRF token is added once
            if (!formModal.querySelector('input[name="_token"]')) {
                let csrfToken = document.createElement('input');
                csrfToken.setAttribute('type', 'hidden');
                csrfToken.setAttribute('name', '_token');
                csrfToken.setAttribute('value', '{{ csrf_token() }}');
                formModal.appendChild(csrfToken);
            }
        }

        const editSourceModal = (button) => {
            const formModal = document.getElementById('formSourceModalEdit');
            const modalTarget = button.dataset.modalTarget;
            const id = button.dataset.id;
            const nama = button.dataset.nama;
            const alamat = button.dataset.alamat;
            const jenis_kelaminValue = button.dataset.jenis_kelamin;

            let url = "{{ route('member.update', ':id') }}".replace(':id', id);

            console.log(url);
            document.getElementById('title_source').innerText = `Update Member ${nama}`;

            document.getElementById('nama').value = nama;
            document.getElementById('alamat').value = alamat;
            document.getElementById('jenis_kelamin_edit').value = jenis_kelaminValue;

            let event = new Event('change');
            document.getElementById('jenis_kelamin_edit').dispatchEvent(event);

            formModal.setAttribute('action', url);

            if (!formModal.querySelector('input[name="_token"]')) {
                let csrfToken = document.createElement('input');
                csrfToken.setAttribute('type', 'hidden');
                csrfToken.setAttribute('name', '_token');
                csrfToken.setAttribute('value', '{{ csrf_token() }}');
                formModal.appendChild(csrfToken);
            }

            if (!formModal.querySelector('input[name="_method"]')) {
                let methodInput = document.createElement('input');
                methodInput.setAttribute('type', 'hidden');
                methodInput.setAttribute('name', '_method');
                methodInput.setAttribute('value', 'PATCH');
                formModal.appendChild(methodInput);
            }

            document.getElementById(modalTarget).classList.remove('hidden');
        }

        const sourceModalClose = () => {
            document.getElementById('sourceModalEdit').classList.add('hidden');
            document.getElementById('sourceModal').classList.add('hidden');
        }

        const memberDelete = async (id, member) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus Member ${member} ?`);
            if (tanya) {
                await axios.post(`/member/${id}`, {
                        '_method': 'DELETE',
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    })
                    .then(function(response) {
                        // Handle success
                        location.reload();
                    })
                    .catch(function(error) {
                        // Handle error
                        alert('Error deleting record');
                        console.log(error);
                    });
            }
        }
    </script>
</x-app-layout>