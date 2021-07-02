USE [RAMEX]
GO

/****** Object:  Table [dbo].[Privilege]    Script Date: 28/12/2020 10:57:00 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[Privilege](
	[num_privilege] [int] NOT NULL,
	[intitule_privilege] [varchar](50) NOT NULL,
 CONSTRAINT [PK_Privilege] PRIMARY KEY CLUSTERED
(
	[num_privilege] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
