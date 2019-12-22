import { TestBed } from '@angular/core/testing';

import { U1serInfoService } from './u1ser-info.service';

describe('U1serInfoService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: U1serInfoService = TestBed.get(U1serInfoService);
    expect(service).toBeTruthy();
  });
});
