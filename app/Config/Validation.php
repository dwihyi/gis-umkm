<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
		\Myth\Auth\Authentication\Passwords\ValidationRules::class
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

		// validasi data data kecamatan

		public $kecamatan=[
			'kode_kemendagri' => 'required|is_unique[tb_kecamatan.kode_kemendagri]',
			'kecamatan' => 'required|is_unique[tb_kecamatan.kecamatan]|max_length[20]',
		];

		public $kecamatan_errors = [
			'kode_kemendagri' => [
				'required' => 'Kode Kemendagri tidak boleh kosong',
				'is_unique' => 'Kode Kemendagri Sudah Ada, Input Kode Lain',
				
			],
			'kecamatan' => [
				'required' => 'Nama Kecamatan tidak boleh kosong',
				'is_unique' => 'Nama Kecamatan Sudah Ada, Input Kecamatan Lain',
				'min_length' => 'Nama Kecamatan 20 karakter',
			],
		];

	public $umkm = [
		'import_file' => 'uploaded[import_file]|ext_in[import_file,xls,xlsx]|max_size[import_file, 1000]',	
	];

	public $umkm_errors = [
		'import_file' => [
			'ext_in' => 'File Excel hanya boleh berekstensi xls atau xlsx.',
			'max_size' => 'File Excel maksimal berukuran 1mb',
			'uploaded' => 'File Excel wajib diisi'
		]
	];
}
