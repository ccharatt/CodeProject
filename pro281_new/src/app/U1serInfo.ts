export class U1serInfo{
    private idbook:number;
    private foridsit:number;
    private code:string;
    private card:string;
    constructor(idbook:number,foridsit:number,code:string,card:string){
      this.idbook = idbook;
      this.foridsit = foridsit;
      this.code = code;
      this.card = card;
    }
    
    public getidbook():number{
      return this.idbook;
    }
  
    public getforidsit():number{
      return this.foridsit;
    }
  
    public getcode():string{
      return this.code;
    }

    public getcard():string{
      return this.card;
    }
    
  
  }