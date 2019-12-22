import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PrintcodeComponent } from './printcode.component';

describe('PrintcodeComponent', () => {
  let component: PrintcodeComponent;
  let fixture: ComponentFixture<PrintcodeComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PrintcodeComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PrintcodeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
