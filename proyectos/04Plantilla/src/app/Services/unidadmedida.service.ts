import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { IUnidadMedida } from '../Interfaces/Iunidadmedida';

@Injectable({
  providedIn: 'root'
})
export class UnidadmedidaService {
  apiurl = 'http://localhost/6semestre/proyectos/03MVC/controllers/unidadMedida.controller.php?op=';

  constructor(private lector: HttpClient) {}

  todos(): Observable<IUnidadMedida[]> {
    return this.lector.get<IUnidadMedida[]>(this.apiurl + 'todos');
  }

  uno(idUnidad: number): Observable<IUnidadMedida> {
    const formData = new FormData();
    formData.append('idUnidad_Medida', idUnidad.toString());
    return this.lector.post<IUnidadMedida>(this.apiurl + 'uno', formData);
  }

  eliminar(idUnidad_Medida: number): Observable<number> {
    const formData = new FormData();
    formData.append('idUnidad_Medida', idUnidad_Medida.toString());
    return this.lector.post<number>(this.apiurl + 'eliminar', formData);
  }

  insertar(unidad: IUnidadMedida): Observable<string> {
    const formData = new FormData();
    formData.append('Detalle', unidad.Detalle);
    formData.append('Tipo', unidad.Tipo.toString());
    return this.lector.post<string>(this.apiurl + 'insertar', formData);
  }

  actualizar(unidad: IUnidadMedida): Observable<string> {
    const formData = new FormData();
    formData.append('idUnidad_Medida', unidad.idUnidad_Medida.toString());
    formData.append('Detalle', unidad.Detalle);
    formData.append('Tipo', unidad.Tipo.toString());
    return this.lector.post<string>(this.apiurl + 'actualizar', formData);
  }
}