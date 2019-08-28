using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Cat_admin
{
    #region Cat
    public class Cat
    {
        #region Member Variables
        protected int _id;
        protected string _cat_name;
        protected string _cat_logo;
        protected int _parent_id;
        protected DateTime _created_at;
        protected unknown _updated_at;
        protected int _level;
        #endregion
        #region Constructors
        public Cat() { }
        public Cat(string cat_name, string cat_logo, int parent_id, DateTime created_at, unknown updated_at, int level)
        {
            this._cat_name=cat_name;
            this._cat_logo=cat_logo;
            this._parent_id=parent_id;
            this._created_at=created_at;
            this._updated_at=updated_at;
            this._level=level;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Cat_name
        {
            get {return _cat_name;}
            set {_cat_name=value;}
        }
        public virtual string Cat_logo
        {
            get {return _cat_logo;}
            set {_cat_logo=value;}
        }
        public virtual int Parent_id
        {
            get {return _parent_id;}
            set {_parent_id=value;}
        }
        public virtual DateTime Created_at
        {
            get {return _created_at;}
            set {_created_at=value;}
        }
        public virtual unknown Updated_at
        {
            get {return _updated_at;}
            set {_updated_at=value;}
        }
        public virtual int Level
        {
            get {return _level;}
            set {_level=value;}
        }
        #endregion
    }
    #endregion
}