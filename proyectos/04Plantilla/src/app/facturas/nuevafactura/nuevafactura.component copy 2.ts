import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, FormsModule, ReactiveFormsModule, Validators } from '@angular/forms';
import { Router, ActivatedRoute } from '@angular/router';
import { IFactura } from 'src/app/Interfaces/factura';
import { ICliente } from 'src/app/Interfaces/icliente';
import { ClientesService } from 'src/app/Services/clientes.service';
import { FacturaService } from 'src/app/Services/factura.service';

@Component({
  selector: 'app-nuevafactura',
  standalone: true,
  imports: [FormsModule, ReactiveFormsModule],
  templateUrl: './nuevafactura.component.html',
  styleUrl: './nuevafactura.component.scss'
})
export class NuevafacturaComponent implements OnInit {
  titulo = 'Nueva Factura';
  listaClientes: ICliente[] = [];
  listaClientesFiltrada: ICliente[] = [];
  totalapagar: number = 0;
  frm_factura: FormGroup;
  IdFactura: number | null = null;
  isEditMode: boolean = false;

  constructor(
    private clietesServicios: ClientesService,
    private facturaService: FacturaService,
    private navegacion: Router,
    private rutaActiva: ActivatedRoute
  ) {}

  ngOnInit(): void {
    this.frm_factura = new FormGroup({
      Fecha: new FormControl('', Validators.required),
      Sub_total: new FormControl('', Validators.required),
      Sub_total_iva: new FormControl('', Validators.required),
      Valor_IVA: new FormControl('0.15', Validators.required),
      Clientes_idClientes: new FormControl('', Validators.required)
    });

    this.clietesServicios.todos().subscribe({
      next: (data) => {
        this.listaClientes = data;
        this.listaClientesFiltrada = data;
      },
      error: (e) => {
        console.log(e);
      }
    });
    
    this.rutaActiva.params.subscribe(params => {
      console.log("idFactura   ->    "  + params['idFactura']);
      if (params['idFactura']) {
        this.IdFactura = params['idFactura'];
        this.isEditMode = true;
        this.cargarFactura(this.IdFactura);
        this.titulo = "Editar Factura";
      }
    });
  }

  cargarFactura(id: number) {
    this.facturaService.uno(id).subscribe(factura => {
      console.log(factura);
      this.frm_factura.patchValue({
        Fecha: factura.Fecha,
        Sub_total: factura.Sub_total,
        Sub_total_iva: factura.Sub_total_iva,
        Valor_IVA: factura.Valor_IVA,
        Clientes_idClientes: factura.Clientes_idClientes
      });
      this.calculos();
    });
  }

  grabar() {
    let factura: IFactura = {
      Fecha: this.frm_factura.get('Fecha')?.value,
      Sub_total: this.frm_factura.get('Sub_total')?.value,
      Sub_total_iva: this.frm_factura.get('Sub_total_iva')?.value,
      Valor_IVA: this.frm_factura.get('Valor_IVA')?.value,
      Clientes_idClientes: this.frm_factura.get('Clientes_idClientes')?.value
    };

    if (this.isEditMode && this.IdFactura !== null) {
      this.facturaService.actualizar(factura).subscribe(respuesta => {
        if (respuesta) {
          alert('Factura actualizada');
          this.navegacion.navigate(['/facturas']);
        }
      });
    } else {
      this.facturaService.insertar(factura).subscribe((respuesta) => {
        if (parseInt(respuesta) > 0) {
          alert('Factura grabada');
          this.navegacion.navigate(['/facturas']);
        }
      });
    }
  }

  eliminar() {
    if (this.IdFactura !== null && confirm('¿Está seguro de que desea eliminar esta factura?')) {
      this.facturaService.eliminar(this.IdFactura).subscribe(respuesta => {
        if (respuesta) {
          alert('Factura eliminada');
          this.navegacion.navigate(['/facturas']);
        }
      });
    }
  }

  calculos() {
    let sub_total = this.frm_factura.get('Sub_total')?.value;
    let iva = this.frm_factura.get('Valor_IVA')?.value;
    let sub_total_iva = sub_total * iva;
    this.frm_factura.get('Sub_total_iva')?.setValue(sub_total_iva);
    this.totalapagar = parseInt(sub_total) + sub_total_iva;
  }

  cambio(objetoSleect: any) {
    let idCliente = objetoSleect.target.value;
    this.frm_factura.get('Clientes_idClientes')?.setValue(idCliente);
  }
}
