var gaji = document.getElementById('gaji');
		gaji.addEventListener('keyup', function(e){
           gaji.value = formatRupiah(this.value, 'Rp. ');
		});
    var bonus = document.getElementById('bonus');
		bonus.addEventListener('keyup', function(e){
            bonus.value = formatRupiah(this.value, 'Rp. ');
		});
    var bisnis = document.getElementById('bisnis');
		bisnis.addEventListener('keyup', function(e){
			bisnis.value = formatRupiah(this.value, 'Rp. ');
		});
        var pasif = document.getElementById('pasif');
		pasif.addEventListener('keyup', function(e){
			pasif.value = formatRupiah(this.value, 'Rp. ');
		});

    // ----------------
        var pajak = document.getElementById('pajak');
		pajak.addEventListener('keyup', function(e){
			pajak.value = formatRupiah(this.value, 'Rp. ');
		});
        var donasi = document.getElementById('donasi');
		donasi.addEventListener('keyup', function(e){
			donasi.value = formatRupiah(this.value, 'Rp. ');
		});
        var tabungan = document.getElementById('tabungan');
		tabungan.addEventListener('keyup', function(e){
			tabungan.value = formatRupiah(this.value, 'Rp. ');
		});
    
    var premi = document.getElementById('premi');
		premi.addEventListener('keyup', function(e){
			premi.value = formatRupiah(this.value, 'Rp. ');
		});
    
    var kpr = document.getElementById('kpr');
		kpr.addEventListener('keyup', function(e){
			kpr.value = formatRupiah(this.value, 'Rp. ');
		});
    
    var pinjaman = document.getElementById('pinjaman');
		pinjaman.addEventListener('keyup', function(e){
			pinjaman.value = formatRupiah(this.value, 'Rp. ');
		});

    var belanja = document.getElementById('belanja');
		belanja.addEventListener('keyup', function(e){
			belanja.value = formatRupiah(this.value, 'Rp. ');
		});
    
    var gaya = document.getElementById('gaya');
		gaya.addEventListener('keyup', function(e){
			gaya.value = formatRupiah(this.value, 'Rp. ');
		});

    // ---------------

    var rumah = document.getElementById('rumah');
		rumah.addEventListener('keyup', function(e){
		  rumah.value = formatRupiah(this.value, 'Rp. ');
		});

    var kendaraan = document.getElementById('kendaraan');
		kendaraan.addEventListener('keyup', function(e){
			kendaraan.value = formatRupiah(this.value, 'Rp. ');
		});
    
    var asetlain = document.getElementById('asetlain');
		asetlain.addEventListener('keyup', function(e){
			asetlain.value = formatRupiah(this.value, 'Rp. ');
		});
    
    // ---------------    

    var deposito = document.getElementById('deposito');
		deposito.addEventListener('keyup', function(e){
			deposito.value = formatRupiah(this.value, 'Rp. ');
		});

    var logam = document.getElementById('logam');
		logam.addEventListener('keyup', function(e){
		  logam.value = formatRupiah(this.value, 'Rp. ');
		});
    
    var saham = document.getElementById('saham');
		saham.addEventListener('keyup', function(e){
			saham.value = formatRupiah(this.value, 'Rp. ');
		});

    var investasi = document.getElementById('investasi');
		investasi.addEventListener('keyup', function(e){
		  investasi.value = formatRupiah(this.value, 'Rp. ');
		});
    
    // ---------------    
    
    var kprkpa = document.getElementById('kprkpa');
		kprkpa.addEventListener('keyup', function(e){
			kprkpa.value = formatRupiah(this.value, 'Rp. ');
		});

    var kreditmotor = document.getElementById('kreditmotor');
		kreditmotor.addEventListener('keyup', function(e){
			kreditmotor.value = formatRupiah(this.value, 'Rp. ');
		});
    
    var kewajibanlain = document.getElementById('kewajibanlain');
		kewajibanlain.addEventListener('keyup', function(e){
			kewajibanlain.value = formatRupiah(this.value, 'Rp. ');
		});

		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}