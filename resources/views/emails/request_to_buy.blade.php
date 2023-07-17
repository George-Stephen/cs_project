<p>Hello Seller,</p>

<p>A potential buyer is interested in purchasing the following product:</p>

<p><strong>Product Name:</strong> {{ $data['product']->title }}</p>
<p><strong>Buyer Name:</strong> {{ $data['buyerName'] }}</p>
<p><strong>Buyer Email:</strong> {{ $data['buyerEmail'] }}</p>
<p><strong>Buyer Phone:</strong> {{ $data['buyerPhone'] }}</p>

<p>Please contact the buyer using the provided contact details to proceed with the purchase.</p>

<p>Buyer Details:</p>
<ul>
  <li>Name: {{ $data['buyerName'] }}</li>
  <li>Email: {{ $data['buyerEmail'] }}</li>
  <li>Phone: {{ $data['buyerPhone'] }}</li>
</ul>

<p>Thank you.</p>
