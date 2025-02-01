<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class Panel extends Component
{
    public $nombre;
    public $email;
    public $telefono;
    public $direccion;
    public $clientes;
    public $dispositivos;
    public $clienteActual;
    public $dispositivoActual;
    public $mensaje;

    protected $listeners = [
        'cerrarPanel' => 'cerrar',
        'editarCliente' => 'editarCliente',
        'eliminarCliente' => 'eliminarCliente',
        'nuevoCliente' => 'nuevoCliente',
        'guardarRegistro' => 'guardarRegistro'
    ];

    public function mount()
    {
        $this->clientes = DB::table('customers')->get();
        $this->dispositivos = DB::table('devices')->get();
    }

    public function render()
    {
        return view('panel.customers');
    }

    public function cerrar($mensaje = null)
    {
        if ($mensaje) {
            session()->flash('mensaje', $mensaje);
        }
        return redirect()->route('inicio');
    }

    public function editarCliente($id)
    {
        $cliente = DB::table('customers')->find($id);
        $this->clienteActual = $cliente;
    }

    public function eliminarCliente($id)
    {
        try {
            DB::table('customers')->delete($id);
            $this->cerrar('Cliente eliminado con éxito');
        } catch (\Exception $e) {
            $this->cerrar('Error al eliminar cliente: ' . $e->getMessage());
        }
    }

    public function nuevoCliente()
    {
        $this->clienteActual = null;
        $this->nombre = '';
        $this->email = '';
        $this->telefono = '';
        $this->direccion = '';
    }

    public function guardarRegistro()
    {
        try {
            Validator::make(request()->all(), [
                'nombre' => 'required',
                'email' => 'required|email'
            ])->validate();

            DB::table('customers')->insert([
                'nombre' => request('nombre'),
                'email' => request('email')
            ]);

            $this->cerrar('Cliente creado con éxito');
        } catch (\Exception $e) {
            $this->cerrar('Error al crear cliente: ' . $e->getMessage());
        }
    }

    public function editarDispositivo($id)
    {
        $dispositivo = DB::table('devices')->find($id);
        $this->dispositivoActual = $dispositivo;
    }

    public function eliminarDispositivo($id)
    {
        try {
            DB::table('devices')->delete($id);
            $this->cerrar('Dispositivo eliminado con éxito');
        } catch (\Exception $e) {
            $this->cerrar('Error al eliminar dispositivo: ' . $e->getMessage());
        }
    }

    public function nuevoDispositivo()
    {
        $this->dispositivoActual = null;
        $this->nombre = '';
        $this->tipo = '';
    }

    public function guardarRegistroDispositivo()
    {
        try {
            Validator::make(request()->all(), [
                'nombre' => 'required',
                'tipo' => 'required'
            ])->validate();

            DB::table('devices')->insert([
                'nombre' => request('nombre'),
                'tipo' => request('tipo')
            ]);

            $this->cerrar('Dispositivo creado con éxito');
        } catch (\Exception $e) {
            $this->cerrar('Error al crear dispositivo: ' . $e->getMessage());
        }
    }

    public function cerrarPanel()
    {
        return redirect()->route('inicio');
    }
}