import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NuevaunidadmedidaComponent } from './nuevaunidadmedida.component';

describe('NuevaunidadmedidaComponent', () => {
  let component: NuevaunidadmedidaComponent;
  let fixture: ComponentFixture<NuevaunidadmedidaComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [NuevaunidadmedidaComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(NuevaunidadmedidaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});