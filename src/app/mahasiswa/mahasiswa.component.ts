import { Component, OnInit } from '@angular/core';
import { Mahasiswa } from '../shared/mahasiswa';

@Component({
  selector: 'app-mahasiswa',
  templateUrl: './mahasiswa.component.html',
  styleUrls: ['./mahasiswa.component.css']
})
export class MahasiswaComponent implements OnInit {
  daftarMahasiswa:Mahasiswa[] = [];
  nim = '';
  nama = '';
  kelas = '';
  mahasiswa;

  constructor() { }

  ngOnInit() {
  }

  tambahMahasiswa(){
    this.mahasiswa = new Mahasiswa(this.nim, this.nama, this.kelas);
    this.daftarMahasiswa.push(this.mahasiswa);
    this.nim = '';
    this.nama= '';
    this.kelas = '';
  }

}
