<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Reyhan Tri Ramadan',
            'email' => 'reyhantriramadan@gmail.com',
            'password' => bcrypt('masrey2246'),
            'no_hp' => '082219725915',
            'role' => 'admin',
        ]);

        Produk::create([
            'nama_produk' => 'Tenda Borneo 4',
            'kategori_id' => '1',
            'harga' => '50000',
            'stok' => '4',
            'gambar' => 'borneo_4.png',
            'keterangan' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio voluptates officia ex nesciunt exercitationem ut impedit illo dolore? Natus, pariatur!'
        ]);
        Produk::create([
            'nama_produk' => 'Carriel Kap 40L-55L',
            'kategori_id' => '4',
            'harga' => '40000',
            'stok' => '4',
            'gambar' => 'carriel 40.png',
            'keterangan' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio voluptates officia ex nesciunt exercitationem ut impedit illo dolore? Natus, pariatur!'
        ]);
        Produk::create([
            'nama_produk' => 'Kompor Mawar',
            'kategori_id' => '3',
            'harga' => '15000',
            'stok' => '5',
            'gambar' => 'kompor_mawar.png',
            'keterangan' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio voluptates officia ex nesciunt exercitationem ut impedit illo dolore? Natus, pariatur!'
        ]);

        Produk::create([
            'nama_produk' => 'Lampu Lentera',
            'kategori_id' => '5',
            'harga' => '5000',
            'stok' => '10',
            'gambar' => 'lampu.png',
            'keterangan' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio voluptates officia ex nesciunt exercitationem ut impedit illo dolore? Natus, pariatur!'
        ]);

        Produk::create([
            'nama_produk' => 'Sleeping Bag',
            'kategori_id' => '2',
            'harga' => '8000',
            'stok' => '5',
            'gambar' => 'sleping_bad.png',
            'keterangan' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio voluptates officia ex nesciunt exercitationem ut impedit illo dolore? Natus, pariatur!'
        ]);
        // \App\Models\User::factory(10)->create();
        Kategori::create([
            'nama_kategori' => 'Tenda',
            'gambar' => 'tenda.png'
        ]);
        
        Kategori::create([
            'nama_kategori' => 'Alat Tidur',
            'gambar' => 'slepping bag.png'

        ]);

        Kategori::create([
            'nama_kategori' => 'Alat Masak',
            'gambar' => 'alat_masak.png'

        ]);

        Kategori::create([
            'nama_kategori' => 'Backpacking',
            'gambar' => 'tas.png'
        ]);

        Kategori::create([
            'nama_kategori' => 'Aksesoris',
            'gambar' => 'penerangan.png'

        ]);
    }
}
