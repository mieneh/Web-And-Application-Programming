using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace StudentResultManagement1.Models
{
    public class Product
    {
        [Key]
        public int productID { get; set; }
        [Required]
        [DisplayName("Product Name")]
        public string productName { get; set; }
        [Required]
        [DisplayName("Price")]
        public double price { get; set; }
        [Required]
        [DisplayName("Quantity")]
        public int qty { get; set; }
        [Required]
        [DisplayName("Remarks")]
        public string remarks { get; set; }
    }
}